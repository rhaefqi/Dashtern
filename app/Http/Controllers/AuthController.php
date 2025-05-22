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
            return redirect()->route('dashboard'); // Buat route dashboard jika perlu
        }

        return back()->withErrors(['login' => 'NIM atau Password salah.']);
    }
}
