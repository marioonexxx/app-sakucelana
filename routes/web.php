<?php

use App\Http\Controllers\ManageBiayaOperasionalController;
use App\Http\Controllers\ManageKasirController;
use App\Http\Controllers\ManageKodeRekeningController;
use App\Http\Controllers\ManageProdukController;
use App\Http\Controllers\ManageTransaksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAdministratorController;
use App\Http\Controllers\UserInventarisController;
use App\Http\Controllers\UserKasirController;
use App\Http\Controllers\UserKeuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth','Keuangan','verified')->group(function(){
    Route::get('keuangan/dashboard',[UserKeuanganController::class, 'index'])->name('keuangan.dashboard');
    Route::resource('koderekening', ManageKodeRekeningController::class);
    Route::resource('biaya-operasional', ManageBiayaOperasionalController::class);
    Route::get('/user-keuangan',[UserKeuanganController::class, 'showprofil'])->name('keuangan.showprofil');
    Route::put('/user-keuangan/{id}',[UserKeuanganController::class, 'update'])->name('keuangan.updateprofil');
});



Route::middleware('auth','Inventaris', 'verified')->group(function(){
    Route::get('inventaris/dashboard',[UserInventarisController::class, 'index'])->name('inventaris.dashboard');
    Route::resource('produk', ManageProdukController::class);
});


Route::middleware('auth','Kasir','verified')->group(function(){

    Route::get('/kasir/dashboard',[UserKasirController::class, 'index'])->name('kasir.dashboard');
    Route::resource('kasir',ManageKasirController::class);
    route::resource('transaksi', ManageTransaksiController::class);
    Route::get('/user-kasir',[UserKasirController::class, 'showprofil'])->name('kasir.showprofil');
    Route::put('/user-kasir/{id}',[UserKasirController::class, 'update'])->name('kasir.updateprofil');
});

Route::middleware('auth','Administrator','verified')->group(function(){
    Route::get('adminstrator/dashboard',[UserAdministratorController::class, 'index'])->name('dashboard');
   
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
