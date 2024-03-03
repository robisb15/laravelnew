<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Pendaftaran,
    Berkas,
    BerkasUpload,
    SyaratBerkas,
    JenisFile
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use Storage;
use Str;
use Carbon\Carbon;
use Log;

class PengajuanController extends Controller
{
    public function index()
    {

        return view('admin.pengajuan.index');
    }
    public function data()
    {
        $data = Pendaftaran::
            join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
            ->join('status', 'status.id', '=', 'pendaftarans.status')
            ->leftJoin('profil as user_profile', 'user_profile.id_user', '=', 'pendaftarans.user_id')
            ->leftJoin('profil as admin_profile', 'admin_profile.id_user', '=', 'pendaftarans.admin_id')
            ->where('pendaftarans.status', '!=', '1')
            ->orderBy('pendaftarans.created_at', 'DESC')
            ->select('pendaftarans.*', 'layanan.nama_layanan', 'status.id as id_status', 'user_profile.nama as nama_user','admin_profile.nama as nama_admin')
            ->orderBy('pendaftarans.created_at')
            ->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return '<a href="' . route('pengajuan.show', $data->id_pendaftaran) . '" class="btn btn-sm btn-warning">Detail</a>';
            })
            ->addColumn('nama_status', function ($data) {
                if ($data->id_status == '1') {
                    return '<span class="badge text-bg-secondary m-1">Draft</span>';
                } elseif ($data->id_status == '2') {
                    return '<span class="badge text-bg-primary m-1">Terkirim</span>';
                } elseif ($data->id_status == '3') {
                    return '<span class="badge text-bg-info m-1">Proses</span>';
                } elseif ($data->id_status == '4') {
                    return '<span class="badge text-bg-success m-1">Selesai</span>';
                } elseif ($data->id_status == '5') {
                    return '<span class="badge text-bg-danger m-1">Ditolak</span>';
                }
            })
            ->addColumn('tanggal_pengajuan', function ($data) {
                $tanggal = Carbon::parse($data->created_at)->format('d M Y   h:i');
                return $tanggal;
            })
            ->rawColumns(['aksi', 'nama_status'])
            ->make(true);

    }
    public function show($id)
    {
        $data['pendaftaran'] = DB::table('pendaftarans')->where('pendaftarans.id_pendaftaran', $id)
            ->join('status', 'status.id', '=', 'pendaftarans.status')
            ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
            ->leftJoin('berkas', 'berkas.id_berkas', '=', 'pendaftarans.id_berkas')
            ->select('layanan.nama_layanan', 'status.nama', 'pendaftarans.keterangan', 'pendaftarans.id_pendaftaran', 'status.id as id_status', 'berkas.url', 'berkas.id_berkas', 'pendaftarans.kode_pendaftaran','pendaftarans.status','pendaftarans.id_layanan', 'berkas.nama_file')
            ->first();
        $data['isiFormulir'] = DB::table('isi_formulir')
            ->join('rincian_formulir', 'rincian_formulir.id_rincian_formulir', '=', 'isi_formulir.id_rincian_formulir')
            ->join('layanan', 'layanan.id_layanan', '=', 'rincian_formulir.id_layanan')
            ->where('isi_formulir.id_pendaftaran', $id)
            ->select('isi_formulir.*', 'layanan.nama_layanan', 'rincian_formulir.nama as nama_formulir', 'rincian_formulir.tag as tag_formulir','rincian_formulir.jenis')
            ->orderBy('rincian_formulir.urut')
            ->get();

        if ($data['pendaftaran']->status == 3 || $data['pendaftaran']->status == 4) {
            $data['berkasUpload'] = DB::table('berkas_upload')
                ->join('berkas', 'berkas.id_berkas', '=', 'berkas_upload.id_berkas')
                ->leftJoin('syarat_berkas', 'syarat_berkas.id_syarat_berkas', '=', 'berkas_upload.id_syarat_berkas')
                ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'berkas_upload.id_jenis_file')
                ->select('jenis_file.nama as nama_jenis_file', 'jenis_file.id_berkas as berkas_jenis_file', 'jenis_file.keterangan as jenis_jenis_file', 'berkas_upload.*', 'berkas.nama_file', 'berkas_upload.status as status_berkas', 'syarat_berkas.wajib as syarat_wajib')
                ->where('berkas_upload.id_pendaftaran', $id)
                ->whereNull('berkas_upload.deleted_at')
                ->orderBy('syarat_berkas.urut')
                ->get();

        } else {
            $data['berkasUpload'] = DB::table('syarat_berkas')
                ->leftJoin('berkas_upload', 'berkas_upload.id_syarat_berkas', '=', 'syarat_berkas.id_syarat_berkas')
                ->join('berkas', 'berkas.id_berkas', '=', 'berkas_upload.id_berkas')
                ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
                ->select('jenis_file.nama as nama_jenis_file', 'jenis_file.id_berkas as berkas_jenis_file', 'jenis_file.keterangan as jenis_jenis_file', 'berkas_upload.*', 'berkas.nama_file', 'berkas_upload.status as status_berkas', 'syarat_berkas.wajib as syarat_wajib')
                ->where('syarat_berkas.id_layanan', $data['pendaftaran']->id_layanan)
                ->where('syarat_berkas.status', 1)
                ->whereNull('syarat_berkas.deleted_at')
                ->whereNull('berkas_upload.deleted_at')
                ->where('berkas_upload.id_pendaftaran', $id)
                ->orderBy('syarat_berkas.urut')
                ->get();

        }
        return view('admin.pengajuan.show', $data);
    }
    public function konfirmasi(Request $request)
    {
        $data['id_pendaftaran'] = $request->id_pendaftaran;
        return view('admin.pengajuan.konfirmasi', $data);
    }
    public function konfirmasiBerkas(Request $request)
    {
        $berkas = BerkasUpload::where('id_berkas_upload', $request->id_berkas_upload)->first();
        $pendaftaran = Pendaftaran::find($berkas->id_pendaftaran);
    if(!$pendaftaran->admin_id){
       $pendaftaran->update([
            'admin_id'=>Auth::user()->id
        ]);

    }
    elseif($pendaftaran->admin_id != Auth::user()->id ){
            Alert::warning('Gagal', 'Pengajuan sedang diproses dengan admin lain');
            return back();
    }

        $berkas->update(['status' => $request->status, 'keterangan' => $request->keterangan]);
        Log::info('Konfirmasi Berkas Pengajuan', [
            'user' => Auth::id(),
            'berkas_upload' => $berkas->id_berkas_upload,
            'status' => 'Berhasil',
            'message' => 'User telah memperbarui status berkas pengajuan',
        ]);
        Alert::success('Berhasil', 'Status diperbarui');
        return back();
    }
    public function store(Request $request)
    {
        $berkas = BerkasUpload::where('id_pendaftaran', $request->id_pendaftaran)->get();
        if ($request->status == 3) {

            foreach ($berkas as $key => $value) {
                if ($value->status != 2) {
                    Log::warning('Gagal memperbarui pengajuan', [
                        'user' => Auth::id(),
                        'status' => 'Gagal',
                        'pendaftaran' => $request->id_pendaftaran,
                        'message' => 'User gagal memperbarui pengajuan,Semua berkas belum diterima',
                    ]);
                    Alert::error('Gagal', 'Semua Berkas belum diterima');
                    return back();
                }
            }
        }
        $pendaftaran = Pendaftaran::find($request->id_pendaftaran);
        if (!$pendaftaran->admin_id) {
            $pendaftaran->update([
                'admin_id' => Auth::user()->id
            ]);

        } elseif ($pendaftaran->admin_id != Auth::user()->id) {
            Alert::warning('Gagal', 'Pengajuan sedang diproses dengan admin lain');
            return back();
        }
        $pendaftaran->update([
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]);
        Log::info('Berhasil Memperbarui Pengajuan', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'pendaftaran' => $request->id_pendaftaran,
            'message' => 'User berhasil memperbarui pengajuan',
        ]);
        Alert::success('Berhasil', 'Status diperbarui');
        return redirect()->route('pengajuan.index');
    }
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        if (!$pendaftaran->admin_id) {
            $pendaftaran->update([
                'admin_id' => Auth::user()->id
            ]);

        } elseif ($pendaftaran->admin_id != Auth::user()->id) {
            Alert::warning('Gagal', 'Pengajuan sedang diproses dengan admin lain');
            return back();
        }
        if (!isset($request->file)) {
            Log::warning('Gagal memperbarui status pengajuan', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'pendaftaran' => $id,
                'message' => 'User gagal memperbarui pengajuan,Berkas belum ditambahkan',
            ]);
            Alert::error('Gagal', 'File harus diupload');
            return back();
        }
        if($request->file('file')->getClientMimeType() != 'application/pdf') {
            Log::warning('Gagal memperbarui status pengajuan', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'pendaftaran' => $id,
                'message' => 'User gagal memperbarui pengajuan,format file salah',
            ]);
            Alert::error('Gagal', 'File harus format pdf');
            return redirect()->back();
        }
        $pendaftaran = DB::table('pendaftarans')
            ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')->
            where('pendaftarans.id_pendaftaran', $id)
            ->select('pendaftarans.*', 'layanan.nama_layanan')->first();
        $file = $request->file;
        $extensi = $pendaftaran->nama_layanan . "." . $file->getClientOriginalExtension();
        $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
        Storage::putFileAs('public/hasil', $file, $newname);
        $oldBerkas = Berkas::where('id_berkas', $pendaftaran->id_berkas)->first();
        if ($oldBerkas) {

            Storage::delete($oldBerkas->url);
            $oldBerkas->update([
                'nama_file' => $newname,
                'url' => 'public/hasil/' . $newname,
                'jenis_file' => 'pdf',
                'status' => '1'
            ]);
            $id_berkas = $oldBerkas->id_berkas;
        } else {
            $berkas = Berkas::create([

                'id_berkas' => Str::uuid(4),
                'nama_file' => $newname,
                'url' => 'public/hasil/' . $newname,
                'jenis_file' => 'pdf',
                'status' => '1'
            ]);
            $id_berkas = $berkas->id_berkas;
        }
        Pendaftaran::where('id_pendaftaran', $id)->update([
            'id_berkas' => $id_berkas,
            'status' => '4',
            'keterangan' => $request->keterangan,
        ]);
        Log::info('Berhasil memperbarui pengajuan', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'pendaftaran' => $id,
            'message' => 'User Berhasil memperbarui pengajuan',
        ]);
        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return back();
    }
}
