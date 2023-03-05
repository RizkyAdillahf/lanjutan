<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
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

Route::get('/', function () {
    return view('welcome');
});



//route login
Route::get('login',[LoginController::class,'view'])->name('login')->middleware('guest');
Route::post('login',[LoginController::class,'proses'])->name('login.proses')->middleware('guest');

Route::get('logout',[LoginController::class,'logout'])->name('logout-admin');

Route::get('/dashboard/admin',[DashboardController::class,'admin'])->name('dashboard.admin')->middleware('auth', 'level:admin,petugas');
Route::get('/dashboard/petugas',[DashboardController::class,'petugas'])->name('dashboard.petugas')->middleware('auth');

Route::resource('siswa', SiswaController::class);
Route::get('siswa/{siswa}/edit', [SiswaController::class,'edit'])->name('siswa.edit')->middleware('auth', 'level:admin');
Route::resource('spp', SppController::class)->middleware(['auth', 'level:admin,petugas']);
Route::view('error/403', 'error.403')->name('error.403');

//kelas
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::controller(KelasController::class)->group(function() {
        Route::get('kelas', 'index')->name('kelas.index');
        Route::get('kelas/create', 'create')->name('kelas.create');
        Route::post('kelas', 'store')->name('kelas.store');
        Route::get('kelas/{kelas}', 'show')->name('kelas.show');
        Route::get('kelas/{kelas}/edit', 'edit')->name('kelas.edit');
        Route::put('kelas/{kelas}', 'update')->name('kelas.update');
        Route::delete('kelas/{kelas}', 'destroy')->name('kelas.destroy');
    });
});

//pembayaran
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::controller(PembayaranController::class)->group(function() {
        Route::get('pembayaran', 'index')->name('pembayaran.index');
        Route::get('pembayaran/create', 'create')->name('pembayaran.create');
        Route::post('pembayaran', 'store')->name('pembayaran.store');
    });
});

//petugas
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::controller(PetugasController::class)->group(function() {
        Route::get('petugas', 'index')->name('petugas.index');
        Route::get('petugas/create', 'create')->name('petugas.create');
        Route::post('petugas', 'store')->name('petugas.store');
        Route::get('petugas/{petugas}', 'show')->name('petugas.show');
        Route::get('petugas/{petugas}/edit', 'edit')->name('petugas.edit');
        Route::put('petugas/{petugas}', 'update')->name('petugas.update');
        Route::delete('petugas/{petugas}', 'destroy')->name('petugas.destroy');
    });
});

Route::resource('petugas', PetugasController::class);
