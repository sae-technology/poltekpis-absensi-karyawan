<?php

use App\Http\Controllers\DivisiController;
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
