<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function(){
  Route::get('/login', [AuthController::class, 'view_login'])->name('login');
  Route::post('/login', [AuthController::class, 'login'])->name('login_post');
});

Route::middleware(['auth', 'checklevel:bendahara'])->group(function(){
  Route::get('/kas', [KasController::class, 'index']);
  Route::get('/kas/pemasukan', [KasController::class, 'pemasukan'])->name('pemasukan');
  Route::get('/kas/pemasukan/create', [KasController::class, 'tambahPemasukan'])->name('tambah-pemasukan');
  Route::post('/kas/pemasukan/store', [KasController::class, 'pemasukanStore'])->name('store-pemasukan');
  Route::get('/kas/pemasukan/edit/{id}', [KasController::class, 'pemasukanEdit'])->name('edit-pemasukan');
  Route::put('/kas/pemasukan/update/{id}', [KasController::class, 'pemasukanUpdate'])->name('update-pemasukan');
  Route::delete('/kas/pemasukan/delete/{id}', [KasController::class, 'pemasukanDelete'])->name('hapus-pemasukan');

  Route::get('/kas/pengeluaran', [KasController::class, 'pengeluaran'])->name('pengeluaran');
  Route::get('/kas/pengeluaran/create', [KasController::class, 'tambahPengeluaran'])->name('tambah-pengeluaran');
  Route::post('/kas/pengeluaran/store', [KasController::class, 'pengeluaranStore'])->name('store-pengeluaran');
  Route::get('/kas/pengeluaran/edit/{id}', [KasController::class, 'pengeluaranEdit'])->name('edit-pengeluaran');
  Route::put('/kas/pengeluaran/update/{id}', [KasController::class, 'pengeluaranUpdate'])->name('update-pengeluaran');
  Route::delete('/kas/pengeluaran/delete/{id}', [KasController::class, 'pengeluaranDelete'])->name('hapus-pengeluaran');
});

Route::middleware(['auth', 'checklevel:sekretaris'])->group(function(){
  Route::get('/absensi/{id}', [AbsensiController::class,'index']); // QR Code
  Route::get('/absensi', [AbsensiController::class, 'view_absen']);
  // Route::get('/absensi/edit/{id}', [AbsensiController::class, 'edit_absen']);
  Route::post('/absensi', [AbsensiController::class, 'store']);
});

Route::middleware(['auth', 'checklevel:bendahara,sekretaris'])->group(function(){
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

URL::forceScheme('https');