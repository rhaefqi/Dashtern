<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

        if ($data['status'] == 'mahasiswa') {
            $cekAkun = User::where('username', $data['username'])->first();
            $cekMahasiswa = Mahasiswa::where('nim', $data['username'])->first();

            if (!$cekMahasiswa) {
                return back()->with('error', 'NIM tidak terdaftar');
            }

            // dd($data['nim']);
            if (!$cekAkun) {
                User::create([
                    'username' => $data['username'],
                    'password' => bcrypt($data['password']),
                    'status' => 'mahasiswa'
                ]);
            }
        }

        try {
            if (Auth::attempt($data)) {
                $request->session()->regenerate();
                if ($data['status'] == 'mahasiswa') {
                    return redirect()->route('beranda');
                } else {
                    return redirect()->route('admin.beranda');
                }
            } else {
                return back()->withErrors(['login' => 'Password salah.']);
            }
        } catch (\Exception $e) {
            return back()->with('agah', 'Terjadi kesalahan: ' . $e->getMessage());
        }


        // if (Auth::attempt($data)) {
        //     $request->session()->regenerate();

        //     return redirect()->route('mahasiswa.beranda');
        // } else {
        //     return back()->with('agah', 'tes');
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
