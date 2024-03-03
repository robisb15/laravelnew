<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\File\FileCOntroller;

Route::post('/upload-tempFile', [FileCOntroller::class,'uploadTempFile'])->name('upload-file-temp');
Route::post('/upload-editFile',[FileCOntroller::class,'uploadEditFile'])->name('upload-editFile');
Route::delete('/revert', [FileController::class,'revert'])->name('revert');
Route::post('/upload-file', [FileController::class,'uploadFile'])->name('upload');

Route::get('/files/download/{nama}', [FileController::class,'responseFile'])->name('storage.view');
Route::get('/file/view-file/{id}', [FileController::class, 'viewFile']);
Route::get('/files/view/{id}/{nama}', [FileController::class, 'responseFileId'])->name('storage.view-id');
Route::get('file/format', [FileController::class,'downloadFile'])->middleware('auth');

