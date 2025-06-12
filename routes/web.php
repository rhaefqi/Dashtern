<?php

use App\Models\Mahasiswa;
use App\Models\Pengumuman;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PanduanController;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    // Halaman mahasiswa setelah login
    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');

    Route::get('/kelas', [KelasController::class, 'indexMahasiswa'])->name('kelas');

    Route::post('/gabung-kelas', [MahasiswaController::class, 'joinClass'])->name('kelas.join');
    Route::get('/gabung', [MahasiswaController::class, 'showGabungPage'])->name('gabung');
    Route::get('/tugas/{kode_kelas}', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/detail/{id}', [TugasController::class, 'detail'])->name('tugas.detail');
    Route::get('/tugas/{id}/form', [TugasController::class, 'form'])->name('tugas.form');
    Route::post('/form/submit', [TugasController::class, 'submit'])->name('tugas.submit');

    Route::get('/progres', function () {
        return view('progres');
    })->name('progres');

    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');

    Route::get('/ganti-password', function () {
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
                'regex:/[A-Z]/',
                'regex:/[0-9]/'
            ],
            'confirm_password' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Kata sandi lama salah']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profil')->with('success', 'Kata sandi berhasil diubah!');
    })->name('profil.ganti-password.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

// Halaman Login 1 (Pilihan role)
Route::get('/', function () {
    return view('login-select');
})->name('login');

// Halaman Form Login Mahasiswa
Route::get('/login/mahasiswa', [LoginController::class, 'mahasiswa'])->name('login.mahasiswa');
Route::post('/login/mahasiswa', [AuthController::class, 'login'])->name('auth.login');

// Halaman Form Login Admin
Route::get('/login/admin', [LoginController::class, 'admin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'login'])->name('auth.login.admin');

// // Halaman Beranda Admin (tanpa controller
// Route::get('/admin/beranda', function () {
//     return view('admin.beranda'); 
// })->name('admin.beranda');

// Route::get('/panduan', [PanduanController::class, 'indexMahasiswa']);
// Route::get('/admin/panduan', [PanduanController::class, 'indexAdmin']);
// Route::post('/admin/panduan', [PanduanController::class, 'store']);
// Route::delete('/admin/panduan/{id}', [PanduanController::class, 'destroy']);

// //Halaman Mahasiswa
// Route::get('/beranda', function () {
//     return view('beranda');
// })->name('beranda');

// Route::get('/admin/profil', function () {
//     return view('admin.profil'); 
// })->name('admin.profil');

// Route::get('/admin/tentang', function () {
//     return view('admin.tentang'); 
// })->name('admin.tentang');

Route::get('/admin/mahasiswa',  [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
Route::post('/admin/mahasiswa',  [MahasiswaController::class, 'import'])->name('admin.mahasiswa.import');
Route::get('/admin/mahasiswa?search=' ,  [MahasiswaController::class, 'search'])->name('admin.mahasiswa.search');

// // Route::get('admin/kelas', function () {
// //     return view('admin.kelas');
// // })->name('admin/kelas');

// // baruuuu
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::delete('/kelas/{kode_kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');
    Route::get('/admin', [KelasController::class, 'beranda'])->name('beranda');

    Route::post('pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.delete');

    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.delete');
});

Route::get('/kelas', [KelasController::class, 'indexMahasiswa'])->name('kelas');

Route::get('/admin/kelas/{kode}', [KelasController::class, 'detail'])->name('admin.kelas.show');


Route::resource('pengumuman', PengumumanController::class);
Route::get('/progres', function () {
    return view('progres');
})->name('progres');


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


Route::get('admin/ganti-password', function (){
    return view('admin.ganti-password');
})->name('admin/ganti-password');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('admin/ganti-password', function (Request $request) {
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
})->name('admin/profil.ganti-password.update');


// Route::get('/tugas', function () {
//     return view('tugas');
// })->name('tugas');

// Route::get('/tugas/{id}', function ($id) {
//     return view('detail', ['id' => $id]);
// })->name('tugas.detail');

// routes/web.php
Route::get('/tugas/{id}', [TugasController::class, 'detail'])->name('tugas.detail');


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
