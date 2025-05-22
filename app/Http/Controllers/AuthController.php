<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Contoh logika login, kamu bisa sesuaikan
        $nim = $request->input('nim');
        $password = $request->input('password');

        // Validasi dummy untuk demo
        if ($nim == '123456' && $password == 'password') {
            return redirect()->route('beranda'); // Buat route dashboard jika perlu
        }

        return back()->withErrors(['login' => 'NIM atau Password salah.']);
    }
  
    public function loginAdmin(Request $request)
    {
    $kode = $request->input('kode_admin');
    $password = $request->input('password');

    // Validasi dummy
    if ($kode == 'admin123' && $password == 'password') {
        return redirect()->route('beranda');
    }

    return back()->withErrors(['login' => 'Kode Admin atau Password salah.']);
    }

}
