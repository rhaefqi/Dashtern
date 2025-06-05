<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
   public function joinClass(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|string',
        ]);

        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

        if (!$kelas) {
            return redirect()->back()->with('error', 'Kode kelas tidak ditemukan!');
        }

        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Validasi: hanya bisa join ke kelas yang sesuai dengan data awal
        if ($mahasiswa->kode_kelas !== $request->kode_kelas) {
            return redirect()->back()->with('error', 'Kamu tidak diizinkan masuk ke kelas ini.');
        }

        return redirect('/kelas')->with('success', 'Berhasil masuk ke kelas.');
    }

    
}
