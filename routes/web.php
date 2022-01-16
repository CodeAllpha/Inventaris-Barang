<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DetailPinjamController;


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




// Section Auth Petugas
Route::group([
    'prefix' => config('invensa.prefix')
], function(){
    Route::get('login','LoginPetugasController@formLogin')->name('petugas.login');
    Route::post('login','LoginPetugasController@login');
    Route::middleware(['auth:petugas'])->group(function () {
    Route::post('logout','LoginPetugasController@logout')->name('petugas.logout');
    Route::view('/','pages.statistik.dashboard')->name('petugas.dashboard');
    Route::middleware(['can:level,"admin"'])->group(function() {

    // Section Petugas
    Route::get('/petugas', [PetugasController::class, 'index'])
    ->name('pages.petugas.index');
    Route::get('/petugas/create', [PetugasController::class, 'create'])
    ->name('pages.petugas.create');
    Route::post('/petugas/store', [PetugasController::class, 'store'])
    ->name('petugas.store');
    Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])
    ->name('petugas.edit');
    Route::get('/petugas/update/{id}', [PetugasController::class, 'update'])
    ->name('petugas.update');
    Route::get('/petugas/{id}', [PetugasController::class, 'destroy'])
    ->name('petugas.destroy');

    //Section Jenis
    Route::get('/jenis', [JenisController::class, 'index'])
    ->name('pages.jenis.index');
    Route::get('/jenis/create', [JenisController::class, 'create'])
    ->name('pages.jenis.create');
    Route::post('/jenis/store', [JenisController::class, 'store'])
    ->name('jenis.store');
    Route::get('/jenis/edit/{id}', [JenisController::class, 'edit'])
    ->name('jenis.edit');
    Route::get('/jenis/update/{id}', [JenisController::class, 'update'])
    ->name('jenis.update');
    Route::get('/jenis/{id}', [JenisController::class, 'destroy'])
    ->name('jenis.destroy');

      
        
    //Section ruang
    Route::get('/ruang', [RuangController::class, 'index'])
    ->name('pages.ruang.index');
    Route::get('/ruang/create', [RuangController::class, 'create'])
    ->name('pages.ruang.create');
    Route::post('/ruang/store', [RuangController::class, 'store'])
    ->name('ruang.store');
    Route::get('/ruang/edit/{id}', [RuangController::class, 'edit'])
    ->name('ruang.edit');
    Route::get('/ruang/update/{id}', [RuangController::class, 'update'])
    ->name('ruang.update');
    Route::get('/ruang/{id}', [RuangController::class, 'destroy'])
    ->name('ruang.destroy');



    // Section Pegawai / Users 
    Route::get('/pegawai', [PegawaiController::class, 'index'])
    ->name('pages.pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])
    ->name('pages.pegawai.create');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])
    ->name('pegawai.store');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])
    ->name('pegawai.edit');
    Route::get('/pegawai/update/{id}', [PegawaiController::class, 'update'])
    ->name('pegawai.update');
    Route::get('/pegawai/{id}', [PegawaiController::class, 'destroy'])
    ->name('pegawai.destroy');
    Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show'])
    ->name('pegawai.show');
    

     // Section Inventaris (barang)
     Route::get('/inventaris', [InventarisController::class, 'index'])
     ->name('pages.inventaris.index');
     Route::get('/inventaris/create', [InventarisController::class, 'create'])
     ->name('pages.inventaris.create');
     Route::post('/inventaris/store', [InventarisController::class, 'store'])
     ->name('inventaris.store');
     Route::get('/inventaris/edit/{id}', [InventarisController::class, 'edit'])
     ->name('inventaris.edit');
     Route::put('/inventaris/update/{id}', [InventarisController::class, 'update'])
     ->name('inventaris.update');
     Route::get('/inventaris/{id}', [InventarisController::class, 'destroy'])
     ->name('inventaris.destroy');
     Route::get('/inventaris/show/{id}', [InventarisController::class, 'show'])
     ->name('inventaris.show');
     Route::get('/inventaris/photo/{id}', [InventarisController::class, 'photo'])
     ->name('inventaris.photo');
    
    });

    // Section Peminjaman (barang)
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])
    ->name('pages.peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])
    ->name('pages.peminjaman.create');
    Route::get('/peminjaman/store/{id}', [PeminjamanController::class, 'store'])
    ->name('peminjaman.store');
    Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])
    ->name('peminjaman.edit');
    Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])
    ->name('peminjaman.update');
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])
    ->name('peminjaman.destroy');
    Route::get('/peminjaman/show/{id}', [PeminjamanController::class, 'show'])
    ->name('peminjaman.show');
    Route::get('/peminjaman/photo/{id}', [PeminjamanController::class, 'photo'])
    ->name('peminjaman.photo');

    });

});

   
