<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('nim', $user->username)->first(); 
        return view('profil', compact('mahasiswa'));
    }
}
