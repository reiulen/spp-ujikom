<?php

use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest', 'user'])->group(function() {
    Route::get('/', [AuthLogin::class, 'indexsiswa'])->name('loginsiswa');
    Route::post('/', [AuthLogin::class, 'loginsiswa'])->name('prosesloginsiswa');
    Route::get('/login_pengelola', [AuthLogin::class, 'index'])->name('login');
    Route::post('/login_pengelola', [AuthLogin::class, 'login'])->name('proseslogin');
});

Route::middleware(['auth'])->group(function() {

    Route::group(['middleware' => 'admin'], function(){
        Route::resource('petugas', PetugasController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('spp', SppController::class);
    });

    Route::group(['middleware' => 'siswa'], function(){
        Route::resource('pembayaran', PembayaranController::class);
    });
});


Route::group(['middleware' => 'bukanuser'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthLogin::class, 'logout'])->name('logout');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
});



