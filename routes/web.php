<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function() {
  return response()->json([
    'data' => 'belum ada',
  ]);
});

Route::get('/', [AbsensiController::class, 'index']);
Route::post('/', [AbsensiController::class, 'store']);

Route::middleware(['guest'])->group(function(){
  Route::get('/login', [AuthController::class, 'view_login'])->name('view_login');
  Route::post('/login', [AuthController::class, 'login'])->name('login_post');
});

Route::middleware(['auth', 'checklevel:bendahara'])->group(function(){
  Route::get('/kas', [KasController::class, 'index']);
  Route::get('/kas/pemasukan', [KasController::class, 'create']);
});

Route::middleware(['auth', 'checklevel:bendahara,sekretaris'])->group(function(){
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
