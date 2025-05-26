<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamanController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware('auth',RoleMiddleware::class)->group(function(){
    Route::resource('locations', LocationController::class);
    Route::get('/admin/locations/export', [LocationController::class, 'export'])->name('locations.export');

    Route::resource('petugas', PetugasController::class);

    Route::resource('barang', BarangController::class);

    Route::resource('barang-masuk', BarangMasukController::class);

    Route::resource('barang-keluar', BarangKeluarController::class);

    Route::resource('pengembalian', PengembalianController::class);

    Route::resource('peminjaman', PinjamanController::class);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
