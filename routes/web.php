<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LayananController,
    JenisFileController,
    RincianFormulirController,
    SyaratBerkasController,
    PengajuanController,
    AdminController,
    UserController
};
use App\Http\Controllers\Pdesa\{
    PendaftaranController,
    PdesaController,
};
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Berkas;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cek', function () {
    if (\Auth::user()->role == 'admin') {
        return redirect('/admin');
    } else if (\Auth::user()->role == 'p-desa') {
        return redirect('/p-desa');
    }
});
Route::get('/', [HomeCOntroller::class,'index']);

Route::get('/files/download/{id}', function ($id) {
    $berkas = Berkas::where('id_berkas', $id)->first();
    $fullPath = storage_path('app/' . $berkas->url);
    // Memeriksa apakah file ada sebelum memberikan response
    if (file_exists($fullPath)) {
        return response()->file($fullPath);
    } else {
        abort(404);
    }
 // return Storage::url($request->path);
})->name('storage.view');
Route::get('file/format', function (Request $request) {

    return Storage::download($request->path);
})->middleware('auth');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'dashboard']);
        // User
        Route::get('user/data', [UserController::class, 'data'])->name('user.data');
        Route::resource('user', UserController::class);
        // Admin
        Route::get('admin/data', [AdminController::class, 'data'])->name('admin.data');
        Route::resource('admin', AdminController::class);
        // layanan
        Route::get('layanan/data', [LayananController::class, 'data'])->name('layanan.data');
        Route::put('/layanan/urut/{id}', [LayananController::class, 'urut'])->name('layanan.urut');
        Route::put('/layanan/status/{id}', [LayananController::class, 'status'])->name('layanan.status');
        Route::resource('layanan', LayananController::class);
        // Jenis File
        Route::get('jenis-file/data/', [JenisFileController::class, 'data'])->name('jenis-file.data');
        Route::resource('jenis-file', JenisFileController::class);
        Route::put('/jenis-file/status/{id}', [JenisFileController::class, 'status'])->name('jenis-file.status');
        // Rincian Formulir

        Route::get('rincian-formulir/data/{id}', [RincianFormulirController::class, 'data'])->name('rincian-formulir.data');
        Route::resource('rincian-formulir', RincianFormulirController::class);
        Route::get('/rincian-formulir/layanan/{id}', [RincianFormulirController::class, 'layanan'])->name('rincian-formulir.layanan');
        Route::put('/rincian-formulir/status/{id}', [RincianFormulirController::class, 'status'])->name('rincian-formulir.status');
        Route::put('/rincian-formulir/urut/{id}', [RincianFormulirController::class, 'urut'])->name('rincian-formulir.urut');
        Route::get('/rincian-formulir/tambah/{id}', [RincianFormulirController::class, 'tambah'])->name('rincian-formulir.tambah');
        // SYarat Berkas
        Route::get('syarat-berkas/data/{id}', [SyaratBerkasController::class, 'data'])->name('syarat-berkas.data');
        Route::resource('syarat-berkas', SyaratBerkasController::class);
        Route::get('/syarat-berkas/layanan/{id}', [SyaratBerkasController::class, 'layanan'])->name('syarat-berkas.layanan');
        Route::put('syarat-berkas/status/{id}', [SyaratBerkasController::class, 'status'])->name('syarat-berkas.status');
        Route::put('syarat-berkas/urut/{id}', [SyaratBerkasController::class, 'urut'])->name('syarat-berkas.urut');
        Route::get('syarat-berkas/tambah/{id}', [SyaratBerkasController::class, 'tambah'])->name('syarat-berkas.tambah');
        // Pengajuan
        Route::get('pengajuan/data/', [PengajuanController::class, 'data'])->name('pengajuan.data');
        Route::post('/konfirmasi', [PengajuanController::class, 'konfirmasi'])->name('pengajuan.konfirmasi');
        Route::post('/konfirmasi-berkas', [PengajuanController::class, 'konfirmasiBerkas'])->name('pengajuan.konfirmasi-berkas');
        Route::resource('pengajuan', PengajuanController::class);
        // Profil
        Route::get('/profil/{id}', [AdminController::class, 'show'])->name('profil.index');


    });
});
Route::prefix('p-desa')->group(function () {
    Route::middleware(['auth', 'p-desa'])->group(function () {
        Route::get('/profil/{id}', [PdesaController::class, 'show']);
        Route::get('/', [PdesaController::class, 'dashboard'])->name('p-desa.dashboard');

        Route::get('pendaftaran/data/', [PendaftaranController::class, 'data'])->name('pendaftaran.data');
        Route::get('pendaftaran/layanan/{id}', [PendaftaranController::class, 'layanan'])->name('pendaftaran.layanan');
        Route::resource('pendaftaran', PendaftaranController::class);
        Route::get('/pendaftaran/{id}/editBerkas', [PendaftaranController::class, 'editBerkas'])->name('pendaftaran.editBerkas');
        Route::put('/pendaftaran/updateBerkas/{id}', [PendaftaranController::class, 'updateBerkas'])->name('pendaftaran.updateBerkas');
        Route::middleware(['auth', 'admin'])->group(function () {
        });
    });
});

require __DIR__ . '/auth.php';
