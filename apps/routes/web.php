<?php

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
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/jadwal', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/jadwal/create', [App\Http\Controllers\JadwalController::class, 'create']);
Route::post('/jadwal/aprove/{id}', [App\Http\Controllers\JadwalController::class, 'aprove']);
Route::get('/jadwal/hapus/{id}', [App\Http\Controllers\JadwalController::class, 'hapus']);
Route::get('/jadwal/selesai/{id}', [App\Http\Controllers\JadwalController::class, 'selesai']);

Route::get('/jabatans', [App\Http\Controllers\JabatanController::class, 'index']);
Route::post('/jabatans/store', [App\Http\Controllers\JabatanController::class, 'create']);
Route::post('/jabatans/edit/{id}', [App\Http\Controllers\JabatanController::class, 'update']);
Route::get('/jabatans/hapus/{id}', [App\Http\Controllers\JabatanController::class, 'hapus']);

Route::get('/kendaraan', [App\Http\Controllers\KendaraanController::class, 'index']);
Route::post('/kendaraan/create', [App\Http\Controllers\KendaraanController::class, 'create']);
Route::post('/kendaraan/edit/{id}', [App\Http\Controllers\KendaraanController::class, 'update']);
Route::get('/kendaraan/hapus/{id}', [App\Http\Controllers\KendaraanController::class, 'hapus']);

Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index']);
Route::post('/pegawai/create', [App\Http\Controllers\PegawaiController::class, 'create']);
Route::post('/pegawai/edit/{id}', [App\Http\Controllers\PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{id}', [App\Http\Controllers\PegawaiController::class, 'hapus']);


Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index']);
Route::post('/laporan/filter', [App\Http\Controllers\LaporanController::class, 'filter']);
