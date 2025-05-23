<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

// Halaman Login 1 (Pilihan role)
Route::get('/', function () {
    return view('login-select');
})->name('login');

// Halaman Form Login Mahasiswa
Route::get('/login/mahasiswa', [LoginController::class, 'mahasiswa'])->name('login.mahasiswa');
Route::post('/login/mahasiswa', [AuthController::class, 'login'])->name('auth.login');

// Halaman Form Login Admin
Route::get('/login/admin', [LoginController::class, 'admin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('auth.login.admin');

// Halaman Beranda Admin (tanpa controller)
Route::get('/admin/beranda', function () {
    return view('admin.beranda'); 
})->name('admin.beranda');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('admin/kelas', function () {
    return view('admin.kelas');
})->name('admin/kelas');

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

Route::get('/ganti-password', function (){
    return view('ganti-password');
})->name('ganti-password');

Route::post('/ganti-password', function (Request $request) {
    // Validasi password
    $request->validate([
        'old_password' => 'required',
        'new_password' => [
            'required',
            'string',
            'min:8',
            'regex:/[A-Z]/',  // setidaknya satu huruf kapital
            'regex:/[0-9]/'   // setidaknya satu angka
        ],
        'confirm_password' => 'required|same:new_password',
    ]);

    // Cek apakah password lama benar
    if (!Hash::check($request->old_password, auth()->user()->password)) {
        return back()->withErrors(['old_password' => 'Kata sandi lama salah']);
    }

    // Update password
    auth()->user()->update([
        'password' => Hash::make($request->new_password)
    ]);

    return redirect()->route('profil')->with('success', 'Kata sandi berhasil diubah!');
})->name('profil.ganti-password.update');

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
