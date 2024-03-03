<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;


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
Route::get('/', [HomeCOntroller::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/inbox', [MessageController::class, 'index'])->name('inbox.index');
    Route::get('/inbox/{id}', [MessageController::class, 'show'])->name('inbox.show');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/desa.php';
require __DIR__ . '/file.php';
