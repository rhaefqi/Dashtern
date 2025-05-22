<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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

// Halaman Login 1 (Pilihan role)
Route::get('/', function () {
    return view('login-select');
})->name('login');

// Halaman Login Form Admin
Route::get('/login/admin', [LoginController::class, 'admin'])->name('login.admin');

// Halaman Login Form Mahasiswa
Route::get('/login/mahasiswa', [LoginController::class, 'mahasiswa'])->name('login.mahasiswa');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
