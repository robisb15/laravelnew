<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Layanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Log;
use Validator;
use DataTables;

class LayananController extends Controller
{
    public function index()
    {
        return view('admin.layanan.index');
    }
    public function data()
    {
        $layanan = Layanan::orderBy('urut')->get();
        return datatables()->
            of($layanan)
            ->addIndexColumn()
            ->addColumn('status_layanan', function ($data) {
                return [
                    'id_layanan' => $data->id_layanan,
                    'status' => $data->status
                ];
            })
            ->addColumn('aksi', function ($layanan) {
                return '
            <div class="">
        
                    <a href="javascript:;" onclick="editForm(\'' . route('layanan.update', [$layanan->id_layanan]) . '\', \'' . $layanan->nama_layanan . '\',\' ' . $layanan->keterangan . '\')" class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen"></i></a>
                    <a href="javascript:;" onclick="deleteForm(\'' . route('layanan.destroy', [$layanan->id_layanan]) . '\')" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i></a>
            </div>
            ';
            })
            ->addColumn('update_urut', function ($update_urut) {
                return array(
                    'id_layanan' => $update_urut->id_layanan,
                    'urut' => $update_urut->urut,

                );
            })
            ->addColumn('update_kode', function ($update_kode) {
                return array(
                    'id_layanan' => $update_kode->id_layanan,
                    'kode' => $update_kode->kode,

                );
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
            ->rawColumns(['aksi', 'update_urut', 'nama_status'])
            ->make(true);
    }
    public function create()
    {
        return view('admin.layanan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|max:255|string',
            'keterangan' => 'required|max:255|string',
            'status' => 'required',
            'urut' => 'required',
            'kode'=>'required'
        ], [
            'nama_layanan.required' => 'Nama Layanan harus diisi',
            'nama_layanan.max' => 'Nama maksimal 255 karakter',
            'keterangan.required' => 'Keterangan harus diisi',
            'keterangan.max' => 'Keterangan maksimal 255 karakter',
            'urut.required' => 'Nomor Urut harus diisi',
            'kode.required' => 'Kode harus diisi',
        ]);
        $oldLayanan = Layanan::where('urut', $request->urut)->first();
        if ($oldLayanan) {
            $layanan = Layanan::get();
            $oldLayanan->update(['urut' => count($layanan) + 1]);
        }
        $layanan = Layanan::create([
            'id_layanan' => Str::uuid(4),
            'nama_layanan' => $request->nama_layanan,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'urut' => $request->urut,
            'kode' => $request->kode
        ]);
        Log::info('Berhasil Menambahkan Layanan', [
            'user' => Auth::id(),
            'status' => 'Gagal',
            'layanan' => $layanan->id_layanan,
            'message' => 'User berhasil menambahkan layanan baru',
        ]);
        Alert::success('Berhasil', 'Layanan Ditambahkan');
        return redirect()->route('layanan.index');
    }
    public function urut(Request $request, $id)
    {
        if (!$request->urut) {
            Log::warning('Gagal Memperbarui data', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'layanan' => $id,
                'message' => 'User memperbarui nomor urut layanan',
            ]);
            Alert::warning('Gagal', 'Nomor Urut Tidak Boleh Kosong');
            return redirect()->route('layanan.index');
        }
        $newLayanan = Layanan::where('id_layanan', $id)->first();
        $oldlayanan = Layanan::where('urut', $request->urut)->first();
        if ($oldlayanan) {
            $oldlayanan->update(['urut' => $newLayanan->urut]);
        }
        $newLayanan->update(['urut' => $request->urut]);
        Log::info('Berhasil Memperbarui Layanan', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'layanan' => $id,
            'message' => 'User berhasil memperbarui no urut layanan',
        ]);
        Alert::success('Berhasil', 'Urutan Diperbarui');
        return back();
    }
    public function kode(Request $request, $id)
    {
        if (!$request->kode) {
            Log::warning('Gagal Memperbarui data', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'layanan' => $id,
                'message' => 'User memperbarui nomor urut layanan',
            ]);
            Alert::warning('Gagal', 'Kode Tidak Boleh Kosong');
            return redirect()->route('layanan.index');
        }
        $layanan = Layanan::where('id_layanan', $id)->update(['kode' => $request->kode]);
        Log::info('Berhasil Memperbarui Layanan', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'layanan' => $id,
            'message' => 'User berhasil memperbarui kode layanan',
        ]);
        Alert::success('Berhasil', 'Kode Diperbarui');
        return back();
    }
    public function status(Request $request, $id)
    {
        $layanan = Layanan::where('id_layanan', $id)->first();
        if ($layanan->status == 1) {
            $layanan->update(['status' => 0]);
        } elseif ($layanan->status == 0) {
            $layanan->update(['status' => 1]);
        }
        Log::info('Berhasil Memperbarui status layanan', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'layanan' => $id,
            'message' => 'User berhasil menambahkan layanan baru',
        ]);
        Alert::success('Berhasil', 'Status Diperbarui');
        return back();
    }
    public function update(Request $request, $id)
    {
        if (!$request->nama_layanan || !$request->keterangan) {
            Log::warning('Gagal Memperbarui data layanan', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'layanan' => $id,
                'message' => 'User gagal memperbarui data layanan',
            ]);
            Alert::warning('Gagal', 'Data Tidak Boleh Kosong');
            return redirect()->route('layanan.index');
        }
        Layanan::where('id_layanan', $id)->update([
            'nama_layanan' => $request->nama_layanan,
            'keterangan' => $request->keterangan,
        ]);
        Log::info('Berhasil Memperbarui data layanan', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'layanan' => $id,
            'message' => 'User berhasil memperbarui data layanan',
        ]);
        Alert::success('Berhasil', 'Data Diperbarui');
        return redirect()->route('layanan.index');

    }
    public function destroy($id)
    {
        Layanan::where('id_layanan', $id)->delete();
        Log::info('Berhasil menghapus layanan', [
            'user' => Auth::id(),
            'status' => 'berhasil',
            'layanan' => $id,
            'message' => 'User berhasil menghapus layanan',
        ]);
        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->route('layanan.index');
    }
}