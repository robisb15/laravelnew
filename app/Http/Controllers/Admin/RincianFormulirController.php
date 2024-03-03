<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\RincianFormulir;
use App\Models\Layanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DB;
use Log;
use Alert;

class RincianFormulirController extends Controller
{
    public function index()
    {
        $data['rincianFormulir'] = DB::table('layanan')
            ->leftjoin('rincian_formulir', 'rincian_formulir.id_layanan', '=', 'layanan.id_layanan')
            ->select(['layanan.nama_layanan', 'layanan.id_layanan', DB::raw('COUNT(rincian_formulir.id_layanan) as jumlahForm')])
            ->where('layanan.status', '1')
            ->whereNull('layanan.deleted_at')
            ->whereNull('rincian_formulir.deleted_at')
            ->groupBy('layanan.id_layanan')
            ->orderBy('layanan.urut')->get();
        return view('admin.rincianFormulir.layanan', $data);
    }
    public function data($id)
    {
        $data = RincianFormulir::where('id_layanan', $id)
            ->whereNull('deleted_at')
            ->orderBy('urut', 'asc')
            ->get();
        return datatables()->
            of($data)
            ->addIndexColumn()
            ->addColumn('status_layanan', function ($data) {
                return [
                    'id_rincian_formulir' => $data->id_rincian_formulir,
                    'status' => $data->status
                ];
            })
            ->addColumn('isi_form', function ($data) {
                return array(
                    'jenis' => $data->jenis,
                    'isi' => $data->isi
                );
            })
            ->addColumn('aksi', function ($data) {
                return
                    ' <div class="">
                   <a href="javascript:;" onclick="editForm(\'' . route('rincian-formulir.update', [$data->id_rincian_formulir]) . '\', \'' . $data->nama . '\',\' ' . $data->jenis . '\',\' ' . $data->tag . '\')"  class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen"></i></a>
                   <a href="javascript:;" onclick="deleteForm(\'' . route('rincian-formulir.destroy', [$data->id_rincian_formulir]) . '\')"  class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i></a>
            </div>';
            })
            ->addColumn('update_urut', function ($update_urut) {
                return array(
                    'id_rincian_formulir' => $update_urut->id_rincian_formulir,
                    'urut' => $update_urut->urut,

                );
            })
            ->rawColumns(['aksi', 'update_urut'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string',
            'tag' => 'required|string|max:255',
            'urut' => 'required|numeric',
            'status' => 'required|numeric',
        ], [
            'nama.required' => 'Nama Layanan harus diisi',
            'jenis.required' => 'Keterangan harus diisi',
            'urut.required' => 'Nomor Urut harus diisi',
            'tag.required' => 'Tag harus diisi',
            'status.required' => 'Status harus diisi',
        ]);
        if ($request->jenis == 'option') {
            $request->validate([
                'isi' => 'required|string|max:255',
            ], [
                'isi.required' => 'Kolom Isi harus dilengkapi untuk jenis "Pilihan"',
            ]);
            $isi = explode(",", $request->isi);

            $isi_new = [];
            for ($i = 0; $i < count($isi); $i++) {
                $isi_new[$i] =
                    [
                        'value' => $i + 1,
                        'name' => $isi[$i],
                    ]
                ;

            }
            $oldrincianFormulir = RincianFormulir::where('urut', $request->urut)->where('id_layanan', $request->id_layanan)->first();
            if ($oldrincianFormulir) {
                $rincianFormulir = RincianFormulir::where('id_layanan', $request->id_layanan)->get();
                $oldrincianFormulir->update(['urut' => count($rincianFormulir) + 1]);
            }
            $formulirForm = RincianFormulir::create([
                'id_rincian_formulir' => Str::uuid(4),
                'id_layanan' => $request->id_layanan,
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'isi' => json_encode($isi_new),
                'urut' => $request->urut,
                'tag' => $request->tag,

                'status' => $request->status,
            ]);
            Log::info('Berhasil menambahkan formulir', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'rincian_formulir' => $formulirForm->id_rincian_formulir,
                'message' => 'User berhasil menambahkan formulir',
            ]);
            Alert::success('Berhasil', 'Data telah ditambahkan');
            return redirect()->route('rincian-formulir.layanan', [$request->id_layanan]);

        }
        $oldrincianFormulir = RincianFormulir::where('urut', $request->urut)->where('id_layanan', $request->id_layanan)->first();
        if ($oldrincianFormulir) {
            $rincianFormulir = RincianFormulir::where('id_layanan', $request->id_layanan)->get();
            $oldrincianFormulir->update(['urut' => count($rincianFormulir) + 1]);
        }
        $form = RincianFormulir::create([
            'id_rincian_formulir' => Str::uuid(4),
            'id_layanan' => $request->id_layanan,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'urut' => $request->urut,
            'tag' => $request->tag,

            'status' => $request->status,

        ]);
        Log::info('Berhasil menambahkan formulir', [
            'user' => Auth::id(),
            'status' => 'Gagal',
            'rincian_formulir' => $form->id_rincian_formulir,
            'message' => 'User berhasil menambahkan formulir',
        ]);
        Alert::success('Berhasil', 'Data telah ditambahkan');
        return redirect()->route('rincian-formulir.layanan', [$request->id_layanan]);
    }
    public function layanan($id)
    {
        $data['layanan'] = Layanan::where('id_layanan', $id)->first();
        return view('admin.rincianFormulir.index', $data);
    }
    public function urut(Request $request, $id)
    {
        if (!$request->urut) {
            Log::warning('Gagal memperbarui formulir', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'rincian_formulir' => $id,
                'message' => 'User gagal memperbaru nomor urut formulir, Nomor urut kosong',
            ]);
            Alert::warning('Gagal', 'Nomor Urut Tidak Boleh Kosong');
            return back();
        }
        $newrincianFormulir = RincianFormulir::where('id_rincian_formulir', $id)->first();
        $oldrincianFormulir = RincianFormulir::where('urut', $request->urut)->first();
        if ($oldrincianFormulir) {

            $oldrincianFormulir->update(['urut' => $newrincianFormulir->urut]);
        }
        $newrincianFormulir->update(['urut' => $request->urut]);
        Log::info('Berhasil memperbarui formulir', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'rincian_formulir' => $id,
            'message' => 'User berhasil memperbarui nomor urut formulir',
        ]);
        Alert::success('Berhasil', 'Urutan Diperbarui');
        return back();
    }
    public function status(Request $request, $id)
    {
        $form = RincianFormulir::where('id_rincian_formulir', $id)->first();
        if ($form->status == 1) {
            $form->update(['status' => 0]);
        } elseif ($form->status == 0) {
            $form->update(['status' => 1]);
        }
        Log::info('Berhasil memperbarui status formulir', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'rincian_formulir' => $id,
            'message' => 'User berhasil memperbarui status formulir',
        ]);
        Alert::success('Berhasil', 'Status Diperbarui');
        return back();
    }
    public function tambah($id)
    {
        $data['layanan'] = Layanan::where('id_layanan', $id)->first();
        return view('admin.rincianFormulir.create', $data);
    }
    public function update(Request $request, $id)
    {
        if (!$request->nama || !$request->tag) {
            Log::warning('Gagal memperbarui formulir', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'rincian_formulir' => $id,
                'message' => 'User gagal memperbaru formulir, Data tidak lengkap',
            ]);
            Alert::error("Gagal", 'Lengkapi Data');
            return back();
        }
        if ($request->jenis == 'option') {
            if (!$request->isi) {
                Log::warning('Gagal memperbarui formulir', [
                    'user' => Auth::id(),
                    'status' => 'Gagal',
                    'rincian_formulir' => $id,
                    'message' => 'User gagal memperbaru formulir, Data tidak lengkap',
                ]);
                Alert::warning('Gagal', 'Form isi harus diisi untuk format pilihan');
                return back();
            }
            $isi = explode(",", $request->isi);

            $isi_new = [];
            for ($i = 0; $i < count($isi); $i++) {
                $isi_new[$i] =
                    [
                        'value' => $i + 1,
                        'name' => $isi[$i],
                    ]
                ;

            }
            RincianFormulir::where('id_rincian_formulir', $id)->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'isi' => json_encode($isi_new),
                'tag' => $request->tag,
            ]);
            Log::info('Berhasil memperbarui data formulir', [
                'user' => Auth::id(),
                'status' => 'Berhasil',
                'rincian_formulir' => $id,
                'message' => 'User berhasil memperbarui data formulir',
            ]);
            Alert::success('Berhasil', 'Data Diperbarui');
            return redirect()->back();

        }
        RincianFormulir::where('id_rincian_formulir', $id)->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tag' => $request->tag,
            'isi' => null,
        ]);
        Log::info('Berhasil memperbarui data formulir', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'rincian_formulir' => $id,
            'message' => 'User berhasil memperbarui data formulir',
        ]);
        Alert::success('Berhasil', 'Data telah Diperbarui');
        return back();
    }
    public function destroy($id)
    {
        $formulir = RincianFormulir::where('id_rincian_formulir', $id)->first();
        $idLayanan = $formulir->id_layanan;
        $formulir->delete();
        Log::info('Berhasil menghapus data formulir', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'rincian_formulir' => $id,
            'message' => 'User berhasil menghapus data formulir',
        ]);
        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->route('rincian-formulir.layanan', [$idLayanan]);
    }
}