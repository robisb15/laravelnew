<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LayananController,
    JenisFileController,
    RincianFormulirController,
    SyaratBerkasController,
    PengajuanController,
    AdminController,
    UserController,
    PDFController,
};
use Illuminate\Support\Facades\Artisan;
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
        Route::put('/layanan/kode/{id}', [LayananController::class, 'kode'])->name('layanan.kode');
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

        Route::post('/laporan-pengajuan', [PDFController::class, 'generatePDF'])->name('generate-pdf');
        Route::get('laporan', [PDFController::class, 'index'])->name('laporan.index');

        Route::get('/clear-cache',function(){
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
           return 'clear complete';
        });

    });
});
