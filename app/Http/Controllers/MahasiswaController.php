<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Kelas;

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

    public function index(Request $request)
    {
        $query = $request->input('search'); // Ambil nilai dari input 'search'

        if ($query) {
            $mahasiswa = Mahasiswa::where('nama', 'LIKE', '%' . $query . '%')
                                 ->orWhere('universitas', 'LIKE', '%' . $query . '%')
                                 ->orWhere('fakultas', 'LIKE', '%' . $query . '%')
                                 ->orWhere('prodi', 'LIKE', '%' . $query . '%')
                                 ->orWhere('kelompok', 'LIKE', '%' . $query . '%')
                                 ->get();
        } else {
            $mahasiswa = Mahasiswa::all();
        }
        return view('admin.mahasiswa', compact('mahasiswa'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_mahasiswa' => [
                'required',
                'file',
            ],
        ]);

        Excel::import(new MahasiswaImport, $request->file('excel_mahasiswa'));

        return redirect()->back()->with('success', 'Data mahasiswa berhasil diimport.');
    }

}
