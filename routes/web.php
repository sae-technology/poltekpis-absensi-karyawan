<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

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
    return view('template.master');
});

Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');
Route::get('/divisi-add', [DivisiController::class, 'tambahDivisi'])->name('tambahdivisi');
Route::post('/divisi-save', [DivisiController::class, 'simpanDivisi'])->name('simpandivisi');
Route::get('/divisi/{kode}', [DivisiController::class, 'dataDivisiByKode'])->name('divisibykode');
Route::post('/divisi-update', [DivisiController::class, 'updateDivisi'])->name('editdivisi');
Route::delete('/divisi-delete/{id}', [DivisiController::class, 'hapusDivisi'])->name('hapusdivisi');

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
Route::get('/jabatan-add', [JabatanController::class, 'tambahJabatan'])->name('tambahjabatan');
Route::post('/jabatan-save', [JabatanController::class, 'simpanJabatan'])->name('simpanjabatan');
Route::get('/jabatan/{kode}', [JabatanController::class, 'dataJabatanByKode'])->name('jabatanbykode');
Route::post('/jabatan-update', [JabatanController::class, 'updateJabatan'])->name('editjabatan');
Route::delete('/jabatan-delete/{id}', [JabatanController::class, 'hapusJabatan'])->name('hapusjabatan');

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::get('/karyawan-add', [KaryawanController::class, 'tambahKaryawan'])->name('tambahkaryawan');
Route::get('/karyawan/{id}', [KaryawanController::class, 'dataKaryawanById'])->name('karyawanbyid');
Route::get('/karyawan/{name}', [KaryawanController::class, 'dataKaryawanByName'])->name('karyawanbyname');
Route::post('/karyawan-save', [KaryawanController::class, 'simpanKaryawan'])->name('simpankaryawan');
Route::post('/karyawan-update', [KaryawanController::class, 'updateKaryawan'])->name('editkaryawan');
Route::delete('/karyawan-delete/{id}', [KaryawanController::class, 'hapusKaryawan'])->name('hapuskaryawan');
