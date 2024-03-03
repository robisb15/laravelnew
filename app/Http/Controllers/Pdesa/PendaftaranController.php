<?php

namespace App\Http\Controllers\Pdesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Pendaftaran,
    Layanan,
    RincianFormulir,
    SyaratBerkas,
    IsiFormulir,
    Berkas,
    BerkasUpload,
    JenisFile,
    Temp
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Alert;
use Log;

class PendaftaranController extends Controller
{

    public function index()
    {
        return view('p-desa.pendaftaran.index');
    }
    public function data()
    {
        $data = DB::table('pendaftarans')
            ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
            ->join('status', 'status.id', '=', 'pendaftarans.status')
            ->where('user_id', '=', Auth::user()->id)
            ->select('pendaftarans.*', 'layanan.nama_layanan', 'status.id as id_status')->orderBy('pendaftarans.created_at', 'desc')->get();
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return '<a href="' . route('pendaftaran.show', $data->id_pendaftaran) . '" class="btn btn-sm btn-warning">Detail</a>';
            })
            ->addColumn('nama_status', function ($data) {
                switch ($data->id_status) {
                    case '1':
                        return '<span class="badge text-bg-secondary m-1">Draft</span>';
                        break;
                    case '2':
                        return '<span class="badge text-bg-primary m-1">Terkirim</span>';
                        break;
                    case '3':
                        return '<span class="badge text-bg-info m-1">Proses</span>';
                        break;
                    case '4':
                        return '<span class="badge text-bg-success m-1">Selesai</span>';
                        break;
                    case '5':
                        return '<span class="badge text-bg-danger m-1">Ditolak</span>';
                        break;
                    default:
                        return '';
                }
            })
            ->addColumn('tanggal_pengajuan', function ($data) {
                $tanggal = Carbon::parse($data->created_at)->format('d M Y   h:i');
                return $tanggal;
            })
            ->rawColumns(['aksi', 'nama_status'])
            ->make(true);

    }
    public function create()
    {
        $data['layanan'] = Layanan::where('status', 1)->orderBy('urut')->get();
        return view('p-desa.pendaftaran.create', $data);
    }
    public function layanan($id)
    {
        $data['layanan'] = Layanan::where('id_layanan', $id)->first();
        $data['rincianFormulir'] = RincianFormulir::where('id_layanan', $id)->where('status', 1)->orderBy('urut')->get();
        $data['syaratBerkas'] = DB::table('syarat_berkas')->where('id_layanan', $id)
            ->join('jenis_file', 'syarat_berkas.id_jenis_file', '=', 'jenis_file.id_jenis_file')
            ->leftJoin('berkas', 'berkas.id_berkas', '=', 'jenis_file.id_berkas')
            ->where('syarat_berkas.status', 1)
            ->whereNull('syarat_berkas.deleted_at')
            ->select('syarat_berkas.*', 'jenis_file.nama as nama_file', 'jenis_file.keterangan as keterangan_file', 'berkas.url as url_source', 'jenis_file.multiple_files')
            ->orderBy('syarat_berkas.urut')
            ->get();

        return view('p-desa.pendaftaran.layanan', $data);
    }

    public function store(Request $request)
    {
        if ($request->has('draft')) {
            $status = 1;
        } elseif ($request->has('kirim')) {
            $status = 2;
        }
        if (!$request->has('file')) {
            Log::warning('Gagal Pengajuan', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'layanan' => $request->id_layanan,
                'message' => 'User gagal melakukan pengajuan layanan,berkas kosong',
            ]);

            Alert::error('Gagal', 'Berkas Kosong');
            return back();
        }
        $formulir = RincianFormulir::where('id_layanan', $request->id_layanan)->where('status', 1)->orderBy('urut')->get();
        if (count($formulir) != 0) {
            if (!isset($request->formulir)) {
                Log::warning('Gagal Pengajuan', [
                    'user' => Auth::id(),
                    'status' => 'Gagal',
                    'layanan' => $request->id_layanan,
                    'message' => 'User gagal melakukan pengajuan layanan,formulir kosong',
                ]);
                Alert::error('Gagal', 'Formulir Kosong');
                return back();
            }
            foreach ($formulir as $key => $item) {
                if (!$request->formulir[$key]['isi']) {
                    Log::warning('Gagal Pengajuan', [
                        'user' => Auth::id(),
                        'status' => 'Gagal',
                        'layanan' => $request->id_layanan,
                        'message' => 'User gagal melakukan pengajuan layanan,data tidak lengkap',
                    ]);
                    Alert::error('Gagal', 'Lengkapi data terlebih dahulu');
                    return back();
                }
            }
        }
        for ($i = 0; $i < count($request->id_syarat_berkas); $i++) {
            $syarat = SyaratBerkas::where('id_syarat_berkas', $request->id_syarat_berkas[$i])->first();
            if ($syarat->wajib == 1) {
                if (!isset($request->file[$i])) {
                    Log::warning('Gagal Pengajuan', [
                        'user' => Auth::id(),
                        'status' => 'Gagal',
                        'layanan' => $request->id_layanan,
                        'message' => 'User gagal melakukan pengajuan layanan,file tidak lengkap',
                    ]);
                    Alert::error('Gagal', 'Lengkapi data terlebih dahulu');
                    return back();
                }
            }
        }
        $layanan = Layanan::find($request->id_layanan);
        $pendaftaran = Pendaftaran::create([
            'id_pendaftaran' => Str::uuid(4),
            'id_layanan' => $request->id_layanan,
            'kode_pendaftaran' => $layanan->kode . Carbon::now()->format('dmYhis'),
            'status' => $status,
            'user_id' => Auth::user()->id,
        ]);
        if ($request->has('formulir')) {
            foreach ($request->formulir as $item) {

                $isiFormulir = IsiFormulir::create([
                    'id_isi_formulir' => Str::uuid(4),
                    'id_rincian_formulir' => $item['id_rincian_formulir'],
                    'id_pendaftaran' => $pendaftaran->id_pendaftaran,
                    'id_layanan' => $request->id_layanan,
                    'isi' => $item['isi'],
                    'id_user' => Auth::user()->id,
                ]);
            }
        }
        foreach ($request->id_syarat_berkas as $key => $item) {

            if (isset($request->file[$key])) {
                if (count($request->file[$key]) == 1) {
                    $syaratBerkas = DB::table('syarat_berkas')
                        ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
                        ->where('syarat_berkas.id_syarat_berkas', $item)
                        ->select('syarat_berkas.*', 'jenis_file.nama')->first();
                    $temp = Temp::where('id_tmp', json_decode($request->file[$key][0]))->first();

                    $fileName = $syaratBerkas->nama . "." . 'pdf';
                    $extensi = str_replace('/', '-', $fileName);
                    $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
                    Storage::move('files/temp/' . $temp->folder . '/' . $temp->file, 'public/upload/' . $newname);
                    if (count(Storage::files('files/temp/' . $temp->folder)) === 0) {
                        Storage::deleteDirectory('files/temp/' . $temp->folder);
                    }
                    // Hapus entri dari database
                    $temp->delete();
                    $berkas = Berkas::create([
                        'id_berkas' => Str::uuid(4),
                        'nama_file' => $newname,
                        'url' => 'public/upload/' . $newname,
                        'jenis_file' => 'pdf',
                        'status' => '1'
                    ]);
                    $berkasUpload = BerkasUpload::create([
                        'id_berkas_upload' => Str::uuid(4),
                        'id_berkas' => $berkas->id_berkas,
                        'id_syarat_berkas' => $syaratBerkas->id_syarat_berkas,
                        'id_pendaftaran' => $pendaftaran->id_pendaftaran,
                        'id_jenis_file' => $syaratBerkas->id_jenis_file,
                        'status' => '1'
                    ]);

                } else {
                    if (isset($request->file[$key])) {
                        $syaratBerkas = DB::table('syarat_berkas')
                            ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
                            ->where('syarat_berkas.id_syarat_berkas', $item)
                            ->select('syarat_berkas.*', 'jenis_file.nama')->first();
                        foreach ($request->file[$key] as $index => $item) {

                            $temp = Temp::where('id_tmp', json_decode($item))->first();
                            $fileName = $syaratBerkas->nama . "." . 'pdf';
                            $extensi = str_replace('/', '-', $fileName);
                            $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
                            Storage::move('files/temp/' . $temp->folder . '/' . $temp->file, 'public/upload/' . $newname);
                            if (count(Storage::files('files/temp/' . $temp->folder)) === 0) {
                                Storage::deleteDirectory('files/temp/' . $temp->folder);
                            }
                            // Hapus entri dari database
                            $temp->delete();
                            $berkas = Berkas::create([
                                'id_berkas' => Str::uuid(4),
                                'nama_file' => $newname,
                                'url' => 'public/upload/' . $newname,
                                'jenis_file' => 'pdf',
                                'status' => '1'
                            ]);
                            $berkasUpload = BerkasUpload::create([
                                'id_berkas_upload' => Str::uuid(4),
                                'id_berkas' => $berkas->id_berkas,
                                'id_syarat_berkas' => $syaratBerkas->id_syarat_berkas,
                                'id_pendaftaran' => $pendaftaran->id_pendaftaran,
                                'id_jenis_file' => $syaratBerkas->id_jenis_file,
                                'status' => '1'
                            ]);
                        }

                    }
                }
            }

        }
        Log::info('Pengajuan Berhasil', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'layanan' => $request->id_layanan,
            'message' => 'User berhasil mengajukan pendaftaran',
        ]);
        Alert::success('Berhasil', 'Pendaftaran Berhasil');
        return redirect(route('pendaftaran.index'));

    }
    public function show($id)
    {
        $data['pendaftaran'] = DB::table('pendaftarans')
            ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
            ->leftJoin('berkas', 'berkas.id_berkas', '=', 'pendaftarans.id_berkas')
            ->join('status', 'status.id', '=', 'pendaftarans.status')
            ->where('id_pendaftaran', $id)
            ->select('pendaftarans.*', 'layanan.nama_layanan', 'berkas.url', 'status.nama', 'berkas.nama_file')->first();
        $data['isiFormulir'] = DB::table('isi_formulir')
            ->join('rincian_formulir', 'rincian_formulir.id_rincian_formulir', '=', 'isi_formulir.id_rincian_formulir')
            ->join('layanan', 'layanan.id_layanan', '=', 'rincian_formulir.id_layanan')
            ->where('isi_formulir.id_pendaftaran', $id)
            ->select('isi_formulir.*', 'layanan.nama_layanan', 'rincian_formulir.nama as nama_formulir', 'rincian_formulir.tag as tag_formulir', 'rincian_formulir.jenis')
            ->orderBy('rincian_formulir.urut')
            ->get();
        if ($data['pendaftaran']->status == 3 || $data['pendaftaran']->status == 4) {
            $data['berkasUpload'] = DB::table('berkas_upload')
                ->join('berkas', 'berkas.id_berkas', '=', 'berkas_upload.id_berkas')
                ->leftJoin('syarat_berkas', 'syarat_berkas.id_syarat_berkas', '=', 'berkas_upload.id_syarat_berkas')
                ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'berkas_upload.id_jenis_file')
                ->select(
                    'jenis_file.nama as nama_jenis_file',
                    'jenis_file.id_berkas as berkas_jenis_file',
                    'jenis_file.keterangan as jenis_jenis_file',
                    'berkas_upload.*',
                    'berkas.nama_file',
                    'berkas_upload.status as status_berkas',
                    'syarat_berkas.wajib as syarat_wajib'
                )
                ->where('berkas_upload.id_pendaftaran', $id)
                ->whereNull('berkas_upload.deleted_at')
                ->orderBy('syarat_berkas.urut')
                ->get();

        } else {
            // $data['berkasUpload'] = DB::table('syarat_berkas')
            //     ->join('berkas_upload', 'berkas_upload.id_syarat_berkas', '=', 'syarat_berkas.id_syarat_berkas')
            //     ->join('berkas', 'berkas.id_berkas', '=', 'berkas_upload.id_berkas')
            //     ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
            //     ->select(
            //         'jenis_file.nama as nama_jenis_file',
            //         'jenis_file.id_berkas as berkas_jenis_file',
            //         'jenis_file.keterangan as jenis_jenis_file',
            //         'berkas_upload.id_berkas_upload',
            //         'berkas_upload.status as status_berkas',
            //         'syarat_berkas.wajib as syarat_wajib',
            //         'syarat_berkas.id_syarat_berkas'
            //     )
            //     ->where('syarat_berkas.id_layanan', $data['pendaftaran']->id_layanan)
            //     ->where('syarat_berkas.status', 1)
            //     ->where('berkas_upload.id_pendaftaran', $id)
            //     ->whereNull('syarat_berkas.deleted_at')
            //     ->whereNull('berkas_upload.deleted_at')
            //     ->groupBy('syarat_berkas.id_syarat_berkas')
            //     ->orderBy('syarat_berkas.urut')
            //     ->get();
            $data['berkasUpload'] = BerkasUpload::
                join('berkas', 'berkas.id_berkas', '=', 'berkas_upload.id_berkas')
                ->leftJoin('syarat_berkas', 'syarat_berkas.id_syarat_berkas', '=', 'berkas_upload.id_syarat_berkas')
                ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'berkas_upload.id_jenis_file')
                ->select(
                    'jenis_file.nama as nama_jenis_file',
                    'jenis_file.id_berkas as berkas_jenis_file',
                    'jenis_file.keterangan as jenis_jenis_file',
                    'jenis_file.multiple_files',
                    'berkas_upload.*',
                    'berkas.nama_file',
                    'berkas_upload.status as status_berkas',
                    'syarat_berkas.wajib as syarat_wajib'
                )
                ->where('berkas_upload.id_pendaftaran', $id)
                ->get()
                ->groupBy('id_syarat_berkas');

            $data['syaratBerkas'] = SyaratBerkas::where('id_layanan', $data['pendaftaran']->id_layanan)
                ->where('syarat_berkas.status', 1)
                ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
                ->select(
                    'jenis_file.nama as nama_jenis_file',
                    'jenis_file.keterangan as jenis_jenis_file',
                    'jenis_file.multiple_files',
                    'syarat_berkas.*',
                    'jenis_file.id_berkas as berkas_jenis_file',
                )->orderBy('urut')->get();
        }
        return view('p-desa.pendaftaran.show', $data);
    }
    public function edit($id)
    {
        $data['pendaftaran'] = Pendaftaran::where('id_pendaftaran', $id)->first();
        $data['isiFormulir'] = DB::table('isi_formulir')->where('isi_formulir.id_pendaftaran', $id)
            ->join('rincian_formulir', 'rincian_formulir.id_rincian_formulir', '=', 'isi_formulir.id_rincian_formulir')
            ->orderBy('rincian_formulir.urut', 'asc')
            ->select('rincian_formulir.*', 'isi_formulir.isi as isi_formulir', 'isi_formulir.id_isi_formulir')
            ->get();
        return view('p-desa.pendaftaran.edit', $data);
    }
    public function update(Request $request, $id)
    {

        $formulir = RincianFormulir::where('id_layanan', $request->id_layanan)->where('status', 1)->get();
        foreach ($formulir as $key => $item) {
            if (!$request->formulir[$key]['isi']) {
                Log::warning('Gagal Pengajuan', [
                    'user' => Auth::id(),
                    'status' => 'Gagal',
                    'layanan' => $request->id_layanan,
                    'message' => 'User gagal melakukan pengajuan layanan,formulir kosong',
                ]);
                Alert::error('Gagal', 'Lengkapi data terlebih dahulu');
                return back();
            }
        }
        foreach ($request->formulir as $item) {
            IsiFormulir::where('id_isi_formulir', $item['id_isi_formulir'])->update([
                'isi' => $item['isi']
            ]);
        }
        if ($request->has('draft')) {
            $status = 1;
        } elseif ($request->has('kirim')) {
            $status = 2;
        }
        Pendaftaran::where('id_pendaftaran', $id)->update([
            'status' => $status
        ]);
        Log::info('Pengajuan Berhasil', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'layanan' => $request->id_layanan,
            'message' => 'User berhasil memperbarui formulir',
        ]);
        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect(route('pendaftaran.index'));
    }
    public function editBerkas($id)
    {
        $pendaftaran = Pendaftaran::where('id_pendaftaran', $id)->first();
        $data['pendaftaran'] = $pendaftaran;
        $data['berkasUpload'] = DB::table('berkas_upload')->where('berkas_upload.id_pendaftaran', $id)->get();
        $data['syaratBerkas'] = DB::table('syarat_berkas')->where('id_layanan', $pendaftaran->id_layanan)
            ->join('jenis_file', 'syarat_berkas.id_jenis_file', '=', 'jenis_file.id_jenis_file')
            ->leftJoin('berkas', 'berkas.id_berkas', '=', 'jenis_file.id_berkas')
            ->where('syarat_berkas.status', 1)
            ->whereNull('syarat_berkas.deleted_at')
            ->select('syarat_berkas.*', 'jenis_file.nama as nama_file', 'jenis_file.keterangan as keterangan_file', 'berkas.url as url_source')
            ->orderBy('syarat_berkas.urut')
            ->get();
        return view('p-desa.pendaftaran.editBerkas', $data);
    }
    // public function updateBerkas(Request $request, $id)
    // {
    //     for ($i = 0; $i < count($request->id_syarat_berkas); $i++) {
    //         $syarat = SyaratBerkas::where('id_syarat_berkas', $request->id_syarat_berkas[$i])->first();
    //         if ($syarat->status == 1) {
    //             if (!isset($request->file[$i]['file'])) {
    //                 Log::warning('Gagal Pengajuan', [
    //                     'user' => Auth::id(),
    //                     'status' => 'Gagal',
    //                     'layanan' => $request->id_layanan,
    //                     'message' => 'User gagal melakukan pengajuan layanan,berkas kosong',
    //                 ]);
    //                 Alert::error('Gagal', 'Lengkapi data terlebih dahulu');
    //                 return back();
    //             }

    //             $file = $request->file[$i]['file'];

    //             // Check if the file is a PDF
    //             $extension = $file->getClientOriginalExtension();
    //             if ($extension !== 'pdf') {
    //                 Log::warning('Gagal Pengajuan', [
    //                     'user' => Auth::id(),
    //                     'status' => 'Gagal',
    //                     'layanan' => $request->id_layanan,
    //                     'message' => 'User gagal melakukan pengajuan layanan,format file salah',
    //                 ]);
    //                 Alert::error('Gagal', 'File harus berformat PDF');
    //                 return back();
    //             }
    //         }
    //     }
    //     if ($request->has('draft')) {
    //         $status = 1;
    //     } elseif ($request->has('kirim')) {
    //         $status = 2;
    //     }
    //     $pendaftaran = Pendaftaran::where('id_pendaftaran', $id)->first();
    //     $pendaftaran->update([
    //         'status' => $status
    //     ]);
    //     $berkas = BerkasUpload::where('id_pendaftaran', $id)->get();
    //     if($berkas){
    //         for($i=0;$i<count($berkas);$i++){
    //             $file= Berkas::where('id_berkas',$berkas[$i]->id_berkas)->first();
    //             Storage::delete($file->url);
    //             $file->delete();
    //             $berkas[$i]->delete();
    //         }
    //     }
    //     foreach ($request->file as $key => $item) {
    //         $syaratBerkas = DB::table('syarat_berkas')
    //             ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
    //             ->where('syarat_berkas.id_syarat_berkas', $request->id_syarat_berkas[$key])
    //             ->select('syarat_berkas.*', 'jenis_file.nama')->first();

    //         $file = $item['file'];
    //         $extensi = $syaratBerkas->nama . "." . $file->getClientOriginalExtension();
    //         $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
    //         // $size = $file->getSize();

    //         Storage::putFileAs('public/upload', $file, $newname);
    //             $berkas = Berkas::create([
    //                 'id_berkas' => Str::uuid(4),
    //                 'nama_file' => $newname,
    //                 'url' => 'public/upload/' . $newname,
    //                 'jenis_file' => 'pdf',
    //                 'status' => '1'
    //             ]);
    //             $berkasUpload = BerkasUpload::create([
    //                 'id_berkas_upload' => Str::uuid(4),
    //                 'id_berkas' => $berkas->id_berkas,
    //                 'id_syarat_berkas' => $request->id_syarat_berkas[$key],
    //                 'id_pendaftaran' => $id,
    //                 'status' => '1',
    //                 'id_jenis_file' => $syaratBerkas->id_jenis_file,
    //             ]);

    //     }
    //     Log::info('Pengajuan berhasil', [
    //         'user' => Auth::id(),
    //         'status' => 'Berhasil',
    //         'layanan' => $request->id_layanan,
    //         'message' => 'User berhasil memperbarui berkas',
    //     ]);
    //     Alert::success('Berhasil', 'Berkas telah diUpload');
    //     return redirect(route('pendaftaran.index'));
    // }
    public function updateBerkas(Request $request, $id)
    {
        $syaratBerkas = DB::table('syarat_berkas')
            ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
            ->where('syarat_berkas.id_syarat_berkas', $request->id_syarat_berkas)
            ->select('syarat_berkas.*', 'jenis_file.nama')->first();
        if (!isset($request->file) || $request->file[0] == null) {
            Log::warning('Gagal Pengajuan', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'layanan' => $syaratBerkas->id_layanan,
                'message' => 'User gagal melakukan pengajuan layanan,berkas kosong',
            ]);
            Alert::error('Gagal', 'Lengkapi data terlebih dahulu');
            return back();
        }
        if (count($request->file) == 1) {
            $oldBerkasUpload = BerkasUpload::where('id_pendaftaran', $id)->where('id_syarat_berkas', $request->id_syarat_berkas)->first();
            if ($oldBerkasUpload) {
                $fileOld = Berkas::where('id_berkas', $oldBerkasUpload->id_berkas)->first();
                Storage::delete($fileOld->url);
                $fileOld->delete();
                $oldBerkasUpload->delete();
            }
            $temp = Temp::where('id_tmp', json_decode($request->file[0]))->first();
            $fileName = $syaratBerkas->nama . "." . 'pdf';
            $extensi = str_replace('/', '-', $fileName);
            $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
            Storage::move('files/temp/' . $temp->folder . '/' . $temp->file, 'public/upload/' . $newname);
            if (count(Storage::files('files/temp/' . $temp->folder)) === 0) {
                Storage::deleteDirectory('files/temp/' . $temp->folder);
            }
            // Hapus entri dari database
            $temp->delete();
            $berkas = Berkas::create([
                'id_berkas' => Str::uuid(4),
                'nama_file' => $newname,
                'url' => 'public/upload/' . $newname,
                'jenis_file' => 'pdf',
                'status' => '1'
            ]);
            $berkasUpload = BerkasUpload::create([
                'id_berkas_upload' => Str::uuid(4),
                'id_berkas' => $berkas->id_berkas,
                'id_syarat_berkas' => $syaratBerkas->id_syarat_berkas,
                'id_pendaftaran' => $id,
                'id_jenis_file' => $syaratBerkas->id_jenis_file,
                'status' => '1'
            ]);

        } else {
            $oldBerkasUpload = BerkasUpload::where('id_pendaftaran', $id)->where('id_syarat_berkas', $request->id_syarat_berkas)->get();
            if ($oldBerkasUpload) {

                if (count($oldBerkasUpload) > 0) { {
                        foreach ($oldBerkasUpload as $item) {
                            $fileOld = Berkas::where('id_berkas', $item->id_berkas)->first();
                            Storage::delete($fileOld->url);
                            $fileOld->delete();
                            $item->delete();
                        }
                    }
                }
                foreach ($request->file as $file) {
                    $temp = Temp::where('id_tmp', json_decode($file))->first();
                    $fileName = $syaratBerkas->nama . "." . 'pdf';
                    $extensi = str_replace('/', '-', $fileName);
                    $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
                    Storage::move('files/temp/' . $temp->folder . '/' . $temp->file, 'public/upload/' . $newname);
                    if (count(Storage::files('files/temp/' . $temp->folder)) === 0) {
                        Storage::deleteDirectory('files/temp/' . $temp->folder);
                    }
                    // Hapus entri dari database
                    $temp->delete();
                    $berkas = Berkas::create([
                        'id_berkas' => Str::uuid(4),
                        'nama_file' => $newname,
                        'url' => 'public/upload/' . $newname,
                        'jenis_file' => 'pdf',
                        'status' => '1'
                    ]);
                    $berkasUpload = BerkasUpload::create([
                        'id_berkas_upload' => Str::uuid(4),
                        'id_berkas' => $berkas->id_berkas,
                        'id_syarat_berkas' => $syaratBerkas->id_syarat_berkas,
                        'id_pendaftaran' => $id,
                        'id_jenis_file' => $syaratBerkas->id_jenis_file,
                        'status' => '1'
                    ]);
                }
            }
        }
        Log::info('Pengajuan berhasil', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'layanan' => $request->id_layanan,
            'message' => 'User berhasil memperbarui berkas',
        ]);
        Alert::success('Berhasil', 'Berkas telah diUpload');
        return back();
    }
    public function kirim($id)
    {
        Pendaftaran::find($id)->update([
            'status' => 2
        ]);
        Alert::success('Berhasil', 'Pendaftaran telah dikirim');
        return redirect(route('pendaftaran.show', $id));
    }
}
