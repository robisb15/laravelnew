<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\JenisFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Alert;
use Storage;
use App\Models\Berkas;
use DB;
use Log;

class JenisFileController extends Controller
{
    public function index()
    {
        return view('admin.jenisFile.index');
    }
    public function data()
    {
        $data = DB::table('jenis_file')
            ->leftjoin('berkas', 'berkas.id_berkas', '=', 'jenis_file.id_berkas')
            ->select('jenis_file.*', 'berkas.id_berkas', 'berkas.url')
            ->whereNull('jenis_file.deleted_at')
            ->get();
        return datatables()->
            of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return [
                    'id_jenis_file' => $data->id_jenis_file,
                    'status' => $data->status,
                    'delete' => '<a href="javascript:;" onclick="deleteForm(\'' . route('jenis-file.destroy', [$data->id_jenis_file]) . '\')" class="dropdown-item">Hapus</a>',
                    'edit' => '<a href="javascript:;" onclick="editForm(\'' . route('jenis-file.update', [$data->id_jenis_file]) . '\', \'' . $data->nama . '\',\' ' . $data->keterangan . '\')" class="dropdown-item">Edit</a>',
                ];
            })
            ->addColumn('file', function ($data) {
                if ($data->url) {
                    return '<a href="javascript:;" onclick="lihatFile(\'' . $data->id_berkas . '\')" class="btn btn-sm btn-primary">Lihat</a>';
                } else {
                    return '-';
                }
            })
            ->addColumn('nama_status', function ($status) {
                return '
                 @if (' . $status->status == 1 . ')
                 Aktif
                @elseif(' . $status->status < 1 . ')
                    NonAktif
                @endif
                ';
            })
            ->rawColumns(['aksi', 'update_urut', 'nama_status', 'file'])
            ->make(true);
    }
    public function create()
    {
        return view('admin.jenisFile.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'status.required' => 'Statust harus diisi',
        ]);
        if ($request->file) {
            $file = $request->file;
            $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->nama . '.' . $file->getClientOriginalExtension());
            Storage::putFileAs('public/file', $file, $newname);
            $berkas = Berkas::create([
                'id_berkas' => Str::uuid(4),
                'nama_file' => $newname,
                'url' => 'public/file/' . $newname,
                'jenis_file' => 'pdf',
                'status' => '1'
            ]);
            $id_berkas = $berkas->id_berkas;
        } else {
            $id_berkas = null;
        }
        $jenisFile = JenisFile::create([
            'id_jenis_file' => Str::uuid(4),
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'id_berkas' => $id_berkas,
        ]);
        Log::info('Berhasil menambahkan jenis file', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'jenis_file' => $jenisFile->id_jenis_file,
            'message' => 'User berhasil menambahkan jenis file baru',
        ]);
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('jenis-file.index');
    }
    public function update(Request $request, $id)
    {
        $jenis_file = JenisFile::where('id_jenis_file', $id)->first();
        if (!$request->nama || !$request->keterangan) {
            Log::warning('Gagal Memperbarui Jenis File', [
                'user' => Auth::id(),
                'status' => 'gagal',
                'jenis_file' => $id,
                'message' => 'User gagal memperbarui jenis file, data belum lengkap',
            ]);
            Alert::error('Gagal', 'Data harus diisi');
            return redirect()->back();
        }
        if ($request->file) {
            if ($request->file('file')->getClientMimeType() != 'application/pdf') {
                Log::warning('Gagal Memperbarui Jenis File', [
                    'user' => Auth::id(),
                    'status' => 'gagal',
                    'jenis_file' => $id,
                    'message' => 'User gagal memperbarui jenis file, format file salah',
                ]);
                Alert::error('Gagal', 'File harus format pdf');
                return redirect()->back();
            }
            $file = $request->file;
            $extensi = $request->nama . "." . $file->getClientOriginalExtension();
            $newname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $extensi);
            Storage::putFileAs('public/file', $file, $newname);
            $oldBerkas = Berkas::where('id_berkas', $jenis_file->id_berkas)->first();
            if ($oldBerkas) {

                Storage::delete($oldBerkas->url);
                $oldBerkas->update([
                    'nama_file' => $newname,
                    'url' => 'public/file/' . $newname,
                    'jenis_file' => 'pdf',
                    'status' => '1'
                ]);
                $id_berkas = $oldBerkas->id_berkas;
            } else {
                $berkas = Berkas::create([
                    'id_berkas' => Str::uuid(4),
                    'nama_file' => $newname,
                    'url' => 'public/file/' . $newname,
                    'jenis_file' => 'pdf',
                    'status' => '1'
                ]);
                $id_berkas = $berkas->id_berkas;
            }
        } else {
            $oldBerkas = Berkas::where('id_berkas', $jenis_file->id_berkas)->first();
            if ($oldBerkas) {
                Storage::delete($oldBerkas->url);
                $oldBerkas->delete();
            }
            $id_berkas = null;
        }
        $jenis_file->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'id_berkas' => $id_berkas,
        ]);
        Log::info('Berhasil Memperbarui Jenis File', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'jenis_file' => $id,
            'message' => 'User berhasil memperbarui jenis file',
        ]);
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('jenis-file.index');

    }
    public function status(Request $request, $id)
    {
        JenisFile::where('id_jenis_file', $id)->update(['status' => $request->status]);
        Log::info('Berhasil Memperbarui Status Jenis File', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'jenis_file' => $id,
            'message' => 'User berhasil memperbarui status jenis file',
        ]);
        Alert::success('Berhasil', 'Status Diperbarui');
        return back();
    }
    public function destroy($id)
    {
        $jenis_file = JenisFile::where('id_jenis_file', $id)->first();
        $berkas = Berkas::where('id_berkas', $jenis_file->id_berkas)->first();
        if ($berkas) {
            Storage::delete($berkas->url);
            $berkas->delete();
        }
        $jenis_file->delete();
        Log::info('Berhasil Menghapus Jenis File', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'jenis_file' => $id,
            'message' => 'User berhasil menghapus jenis file',
        ]);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('jenis-file.index');
    }
}