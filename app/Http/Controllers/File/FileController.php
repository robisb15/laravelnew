<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Temp,
    Berkas
};
use Str;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{

    public function uploadTempFile(Request $request)
    {
        $index = array_keys($request->file);
        $file = $request->file[$index[0]][0];
        $extensi = $file->getClientOriginalExtension();
        if ($extensi !== 'pdf') {
            abort(422, 'File harus berupa PDF');
        }
        $name = $file->getClientOriginalName();
        $temp = Temp::create([
            'id_tmp' => \Str::uuid(4),
            'folder' => uniqid('file', true),
            'file' => $name,
        ]);
        Storage::putFileAs('files/temp/' . $temp->folder, $file, $name);
        return $temp->id_tmp;
    }
    public function uploadEditFile(Request $request)
    {

        $file = $request->file[0];
        $extensi = $file->getClientOriginalExtension();
        if ($extensi !== 'pdf') {
            abort(422, 'File harus berupa PDF');
        }
        $name = $file->getClientOriginalName();
        $temp = Temp::create([
            'id_tmp' => \Str::uuid(4),
            'folder' => uniqid('file', true),
            'file' => $name,
        ]);
        Storage::putFileAs('files/temp/' . $temp->folder, $file, $name);
        return $temp->id_tmp;
    }
    public function revert(Request $request)
    {

        // Ambil ID berkas yang perlu di-revert dari permintaan
        $id_tmp = json_decode($request->getContent());

        // Lakukan operasi revert di sini, misalnya hapus entri di basis data
        // Sesuaikan dengan logika aplikasi Anda
        $temp = Temp::where('id_tmp', $id_tmp)->first();

        if ($temp) {
            // Hapus file dari penyimpanan
            Storage::delete('files/temp/' . $temp->folder . '/' . $temp->file);

            // Hapus direktori jika kosong
            if (count(Storage::files('files/temp/' . $temp->folder)) === 0) {
                Storage::deleteDirectory('files/temp/' . $temp->folder);
            }

            // Hapus entri dari database
            $temp->delete();
            return response()->json(['message' => 'File reverted successfully'], 200);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
    // public function uploadFile(Request $request)
    // {
    //     if ($request->has('filepond')) {
    //         $file = $request->file('filepond');
    //         $filename = hexdec(uniqid() . '.' . $file->extension());
    //         $folder = uniqid() . '-' . now()->timestamp;
    //         // Session::put('folder',$folder);
    //         // Session::put('filename',$filename);
    //         $temp = Temp::create([
    //             'id' => \Str::uuid(4),
    //             'folder' => $folder,
    //             'filename' => $filename,
    //         ]);
    //         $file->storeAs('files/tmp/' . $folder, $filename);
    //     }
    //     return $data = [
    //         'temp' => $temp,
    //         'id_syarat' => $request->id_syarat
    //     ];
    // }
    public function responseFile(Request $request)
    {
        $berkas = Berkas::where('id_berkas', $request->id_berkas)->first();
        $fullPath = storage_path('app/' . $berkas->url);
    
       // Memeriksa apakah file ada sebelum memberikan response
        if (file_exists($fullPath)) {
            return response()->file($fullPath);
        } else {
            abort(404);
        }
        return Storage::url($request->path);
    }
    public function responseFileId($id, $namaFile)
    {
        $berkas = Berkas::where('id_berkas', $id)->first();
        $fullPath = storage_path('app/' . $berkas->url);
        // Memeriksa apakah file ada sebelum memberikan response
        if (file_exists($fullPath)) {
            return response()->file($fullPath);
        } else {
            abort(404);
        }
        // return Storage::url($request->path);
    }
    public function downloadFile(Request $request)
    {
        if ($request->has('id')) {
            $berkas = Berkas::where('id_berkas', $request->id)->first();
            return Storage::download($berkas->url);
        }
        return Storage::download($request->path);
    }
    public function viewFile($id)
    {
        $berkas = Berkas::where('id_berkas', $id)->first();
        $fullPath = storage_path('app/' . $berkas->url);

        // Memeriksa apakah file ada sebelum memberikan response
        if (file_exists($fullPath)) {
            return response()->file($fullPath);
        } else {
            abort(404);
        }
      
    }
}