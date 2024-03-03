<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SyaratBerkas;
use App\Models\Layanan;
use App\Models\JenisFile;
use Illuminate\Support\Str;
use DB;
use Auth;
use Log;
use Alert;

class SyaratBerkasController extends Controller
{
    public function index()
    {
        $data['syaratBerkas'] = DB::table('layanan')
            ->leftjoin('syarat_berkas', 'syarat_berkas.id_layanan', '=', 'layanan.id_layanan')
            ->whereNull('layanan.deleted_at')
            ->whereNull('syarat_berkas.deleted_at')
            ->select(['layanan.nama_layanan', 'layanan.id_layanan', DB::raw('COUNT(syarat_berkas.id_layanan) as jumlahBerkas')])
            ->where('layanan.status', '1')
            ->groupBy('layanan.id_layanan')
            ->orderBy('layanan.urut')->get();

        return view('admin.syaratBerkas.index', $data);
    }
    public function data($id)
    {
        $data = DB::table('syarat_berkas')
            ->join('layanan', 'layanan.id_layanan', '=', 'syarat_berkas.id_layanan')
            ->join('jenis_file', 'jenis_file.id_jenis_file', '=', 'syarat_berkas.id_jenis_file')
            ->leftjoin('berkas', 'berkas.id_berkas', '=', 'jenis_file.id_berkas')
            ->where('syarat_berkas.id_layanan', $id)
            ->whereNull('syarat_berkas.deleted_at')
            ->where('layanan.status', '1')
            ->select(
                'syarat_berkas.status',
                'syarat_berkas.urut',
                'syarat_berkas.wajib',
                'syarat_berkas.id_jenis_file',
                'jenis_file.nama',
                'jenis_file.keterangan',
                'berkas.url',
                'berkas.id_berkas',
                'berkas.nama_file',
                'syarat_berkas.id_syarat_berkas',
            )
            ->orderBy('syarat_berkas.urut', 'asc')
            ->get();
        return datatables()->
            of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
               
                return '
            <div class="">
        
                    <a href="javascript:;" onclick="editForm(\'' . route('syarat-berkas.update', [$data->id_syarat_berkas]) . '\', \'' . $data->id_jenis_file . '\')" class="btn btn-warning btn-sm m-1"> <i class="fa-solid fa-pen"></i></a>
                    <a href="javascript:;" onclick="deleteForm(\'' . route('syarat-berkas.destroy', [$data->id_syarat_berkas]) . '\')" class="btn btn-danger btn-sm m-1"> <i class="fa-solid fa-trash"></i></a>
            </div>
            ';
            })
            ->addColumn('status_layanan', function ($data) {
                return [
                    'id_syarat_berkas' => $data->id_syarat_berkas,
                    'status' => $data->status
                ];
            })
            ->addColumn('update_urut', function ($update_urut) {
                return array(
                    'id_syarat_berkas' => $update_urut->id_syarat_berkas,
                    'urut' => $update_urut->urut,

                );
            })
            ->addColumn('file', function ($data) {
                if ($data->url) {
                    return '<a href="javascript:;" onclick="lihatFile(\'' . $data->id_berkas . '\', \'' . $data->nama_file . '\')" class="btn btn-sm btn-primary">Lihat</a>';
                } else {
                    return '-';
                }
            })

            ->rawColumns(['aksi', 'update_urut', 'nama_status', 'status_wajib', 'file'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'urut' => 'required|min:1|numeric',
            'id_jenis_file' => 'required',
            'status' => 'required',
            'wajib' => 'required'
        ], [
            'urut.required' => 'Nomor Urut harus diisi',
            'id_jenis_file.required' => 'Jenis File harus diisi',
            'status.required' => 'Status harus diisi',
            'wajib.required' => 'Wajib harus diisi',
            'urut.min' => 'Nomor Urut minimal 1',
            'urut.numeric' => 'Nomor Urut harus berupa angka',
        ]);
        $oldSyarat = SyaratBerkas::where('id_layanan', $request->id_layanan)->where('id_jenis_file',$request->id_jenis_file)->first();
        if($oldSyarat){
            Alert::error('Gagal', 'Berkas sudah ada');
            return redirect()->route('syarat-berkas.layanan', [$request->id_layanan]);
        }
        $oldsyaratBerkas = SyaratBerkas::where('urut', $request->urut)->where('id_layanan', $request->id_layanan)->first();
        if ($oldsyaratBerkas) {
            $syaratBerkas = SyaratBerkas::where('id_layanan', $request->id_layanan)->get();
            $oldsyaratBerkas->update(['urut' => count($syaratBerkas) + 1]);
        }
       $syarat= SyaratBerkas::create([
            'id_syarat_berkas' => Str::uuid(4),
            'id_layanan' => $request->id_layanan,
            'id_jenis_file' => $request->id_jenis_file,
            'status' => $request->status,
            'urut' => $request->urut,
            'wajib' => $request->wajib,
        ]);
        Log::info('Berhasil menambahkan data syarat berkas', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'syarat_berkas' => $syarat->id_syarat_berkas,
            'message' => 'User berhasil menambahkan data syarat berkas',
        ]);
        Alert::success('Berhasil', 'Data ditambahkan');
        return redirect()->route('syarat-berkas.layanan', [$request->id_layanan]);

    }
    public function layanan($id)
    {
        $data['jenisFile'] = JenisFile::whereNull('deleted_at')->where('status', 1)->orderBy('nama')->get();
        $data['layanan'] = Layanan::where('id_layanan', $id)->first();

        return view('admin.syaratBerkas.layanan', $data);
    }
    public function urut(Request $request, $id)
    {
        if (!$request->urut) {
            Log::warning('Gagal memperbarui syarat berkas', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'syarat_berkas' => $id,
                'message' => 'User gagal memperbarui data syarat berkas, nomor urut kosong',
            ]);
            Alert::warning('Gagal', 'Nomor Urut Tidak Boleh Kosong');
            return redirect()->route('syarat-berkas.index');
        }
        $newSyaratBerkas = SyaratBerkas::where('id_syarat_berkas', $id)->first();
        $oldSyaratBerkas = SyaratBerkas::where('urut', $request->urut)->first();
        if ($oldSyaratBerkas) {

            $oldSyaratBerkas->update(['urut' => $newSyaratBerkas->urut]);
        }
        $newSyaratBerkas->update(['urut' => $request->urut]);
        Log::info('Berhasil memperbarui data syarat berkas', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'syarat_berkas' => $id,
            'message' => 'User berhasil memperbarui nomor urut data syarat berkas',
        ]);
        Alert::success('Berhasil', 'Urutan Diperbarui');
        return back();
    }
    public function status(Request $request, $id)
    {
        $syaratBerkas = SyaratBerkas::where('id_syarat_berkas', $id)->first();
        if ($syaratBerkas->status == 1) {
            $syaratBerkas->update(['status' => 0]);
        } elseif ($syaratBerkas->status == 0) {
            $syaratBerkas->update(['status' => 1]);
        }
        Log::info('Berhasil memperbarui status syarat berkas', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'syarat_berkas' => $id,
            'message' => 'User berhasil memperbarui status syarat berkas',
        ]);
        Alert::success('Berhasil', 'Status Diperbarui');
        return back();
    }
    public function tambah($id)
    {
        $data['layanan'] = Layanan::where('id_layanan', $id)->first();
        $data['jenisFile'] = JenisFile::orderBy('nama')->get();
        return view('admin.syaratBerkas.create', $data);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        if (!isset($request->id_jenis_file) || !isset($request->wajib)) {
            Log::warning('Gagal memperbarui syarat berkas', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'syarat_berkas' => $id,
                'message' => 'User gagal memperbarui data syarat berkas, syarat berkas kosong',
            ]);
            Alert::warning('Gagal', 'Syarat Berkas Tidak Boleh Kosong');
            return back();
        }
        $syaratBerkas = SyaratBerkas::find($id);
        $oldSyarat = SyaratBerkas::where('id_layanan', $syaratBerkas->id_layanan)->where('id_jenis_file', $request->id_jenis_file)->first();
        if ($oldSyarat) {
            Alert::error('Gagal', 'Berkas sudah ada');
            return redirect()->route('syarat-berkas.layanan', [$syaratBerkas->id_layanan]);
        }
        SyaratBerkas::where('id_syarat_berkas', $id)->update([
            'id_jenis_file' => $request->id_jenis_file,
            'wajib' => $request->wajib,
        ]);
        Log::info('Berhasil memperbarui data syarat berkas', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'syarat_berkas' => $id,
            'message' => 'User berhasil memperbarui data syarat berkas',
        ]);
        Alert::success('Berhasil', 'Data telah Diperbarui');
        return back();
    }
    public function destroy($id){
        SyaratBerkas::where('id_syarat_berkas', $id)->delete();
        Log::info('Berhasil menghapus syarat berkas', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'syarat_berkas' => $id,
            'message' => 'User berhasil menghapus syarat berkas',
        ]);
        Alert::success('Berhasil', 'Data telah Dihapus');
        return back();
    }
}
