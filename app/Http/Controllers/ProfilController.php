<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('nim', $user->username)->first(); 
        return view('profil', compact('mahasiswa'));
    }
    
    public function gantiPasswordShow(Request $request)
    {
        $user = auth()->user();
        return view('ganti-password');
    }
    public function gantiPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',   // Minimal satu huruf kapital
                'regex:/[0-9]/'    // Minimal satu angka
            ],
            'confirm_password' => 'required|same:new_password',
        ]);
        
        
        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Kata sandi lama salah']);
        }

    $user->update([
        'password' => $request->new_password,
    ]);

    return redirect()->route('profile.show')->with('success', 'Kata sandi berhasil diubah!');

    }
}
