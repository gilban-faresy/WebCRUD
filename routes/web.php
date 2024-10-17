<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/landing-page', [LandingPageController::class, 'index'])->name('landing_page');


Route::prefix('/data-jual')->name('data_jual.')->group(function(){
    Route::get('/data', [DiamondController::class, 'index'])->name('data');
    Route::get('/tambah', [DiamondController::class, 'create'])->name('tambah');
    Route::post('/tambah/proses', [DiamondController::class, 'store'])->name('tambah.proses');
    Route::delete('/hapus/{id}', [DiamondController::class, 'destroy'])->name('hapus');
    Route::get('/ubah/{id}', [DiamondController::class, 'edit'])->name('ubah');
    Route::patch('/ubah/{id}/proses', [DiamondController::class, 'update'])->name('ubah.proses');
});

Route::prefix('/kelola-akun')->name('kelola_akun.')->group(function(){
    Route::get('/data', [UserController::class, 'index'])->name('data');
    // route GET untuk URL /tambah yang memanggil method create pada UserController
    Route::get('/tambah', [UserController::class, 'create'])->name('tambah');
    // route POST untuk URL /tambah/proses yang memanggil method store pada UserController
    Route::post('/tambah/proses', [UserController::class, 'store'])->name('tambah.proses');
    Route::get('/ubah/{id}', [UserController::class, 'edit'])->name('ubah');
    Route::patch('/ubah/{id}/proses', [UserController::class, 'update'])->name('ubah.proses');
    Route::delete('/hapus/{id}', [UserController::class, 'destroy'])->name('hapus');
});
