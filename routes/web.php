<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;


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
Route::resource('spp', SppController::class)->middleware(['auth', 'level:admin']);
Route::resource('kelas', KelasController::class)->middleware(['auth', 'level:admin']);
Route::get('kelas/{kela}/edit',[KelasController::class, 'edit'])->name('kelas_edit')->middleware('auth', 'level:admin');
Route::view('error/403', 'error.403')->name('error.403');

Route::resource('kelas', [KelasController::class]);