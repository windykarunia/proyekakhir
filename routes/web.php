<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;

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

Route::middleware('auth')->group(function (){
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('input_buku', [BukuController::class, 'input']);
    Route::post('kirim_buku', [BukuController::class, 'kirim']);
    Route::get('tampil_buku', [BukuController::class, 'tampil']);
    Route::get('hapus_buku/{kode}', [BukuController::class, 'hapus']);
    Route::get('edit_buku/{kode}', [BukuController::class, 'edit']);
    Route::post('update_buku/{kode}', [BukuController::class, 'update']);

    Route::get('input_member', [MemberController::class, 'input']);
    Route::post('kirim_member', [MemberController::class, 'kirim']);
    Route::get('tampil_member', [MemberController::class, 'tampil']);
    Route::get('hapus_member/{ktp}', [MemberController::class, 'hapus']);
    Route::get('edit_member/{ktp}', [MemberController::class, 'edit']);
    Route::post('update_member/{ktp}', [MemberController::class, 'update']);

    Route::get('input_pinjam', [PinjamController::class, 'input']);
    Route::post('kirim_pinjam', [PinjamController::class, 'kirim']);
    Route::get('tampil_pinjam', [PinjamController::class, 'tampil']);
    Route::get('hapus_pinjam/{id}', [PinjamController::class, 'hapus']);
    Route::get('edit_pinjam/{id}', [PinjamController::class, 'edit']);
    Route::post('update_pinjam/{id}', [PinjamController::class, 'update']);

    Route::get('logout',[LoginController::class,'logout']);

    Route::get('setting',[AkunController::class,'index']);
    Route::post('update_password',[AkunController::class,'update']);
    Route::post('delete',[AkunController::class,'delete']);
});
Route::middleware('guest')->group(function (){
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
});