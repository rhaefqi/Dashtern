<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;



// Halaman Login 1 (Pilihan role)
Route::get('/', function () {
    return view('login-select');
})->name('login');

// Halaman Login Form Admin
Route::get('/login/admin', [LoginController::class, 'admin'])->name('login.admin');

// Halaman Login Form Mahasiswa
Route::get('/login/mahasiswa', [LoginController::class, 'mahasiswa'])->name('login.mahasiswa');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/kelas', function () {
    return view('kelas');
})->name('kelas');

Route::get('/progres', function () {
    return view('progres');
})->name('progres');

Route::get('/panduan', function () {
    return view('panduan');
})->name('panduan');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/tugas', function () {
    return view('tugas');
})->name('tugas');

Route::get('/tugas/{id}', function ($id) {
    return view('detail', ['id' => $id]);
})->name('tugas.detail');

// Halaman form pengumpulan tugas
Route::get('/form', function () {
    return view('form');
})->name('tugas.form');

// Proses submit form
Route::post('/form/submit', function (Request $request) {
    // Validasi data
    $request->validate([
        'jumlah_akuisisi' => 'required|numeric|min:1',
        'link_drive' => 'required|url',
    ]);

    // Simpan atau proses data sesuai kebutuhan, misalnya simpan ke database
    // Untuk sekarang kita cukup redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan!');
})->name('tugas.submit');
