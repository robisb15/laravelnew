<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pdesa\{
    PendaftaranController,
    PdesaController,
};
Route::prefix('p-desa')->group(function () {
    Route::middleware(['auth', 'p-desa'])->group(function () {
        Route::get('/profil/{id}', [PdesaController::class, 'show']);
        Route::get('/', [PdesaController::class, 'dashboard'])->name('p-desa.dashboard');
        Route::get('/pendaftaran/kirim/{id}', [PendaftaranController::class, 'kirim'])->name('kirim.pendaftaran');
        Route::get('pendaftaran/data/', [PendaftaranController::class, 'data'])->name('pendaftaran.data');
        Route::get('pendaftaran/layanan/{id}', [PendaftaranController::class, 'layanan'])->name('pendaftaran.layanan');
        Route::resource('pendaftaran', PendaftaranController::class);
        Route::get('/pendaftaran/{id}/editBerkas', [PendaftaranController::class, 'editBerkas'])->name('pendaftaran.editBerkas');
        Route::put('/pendaftaran/updateBerkas/{id}', [PendaftaranController::class, 'updateBerkas'])->name('pendaftaran.updateBerkas');
        Route::middleware(['auth', 'admin'])->group(function () {
        });
    });
});

