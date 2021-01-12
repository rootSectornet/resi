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
Route::get('/jabatans', [App\Http\Controllers\JabatanController::class, 'index']);
Route::get('/jabatans/tambah', [App\Http\Controllers\JabatanController::class, 'create']);


