<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Panduan;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function indexMahasiswa()
    {
        $mahasiswa = Mahasiswa::where('nim', auth()->user()->username)->first();
        $panduanTerbaru = Panduan::latest()->take(3)->get();

        return view('beranda', compact('mahasiswa', 'panduanTerbaru'));
    }

    public function joinClass(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|string',
        ]);

        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

        if (!$kelas) {
            return redirect()->back()->with('error', 'Kode kelas tidak ditemukan!');
        }

       $mahasiswa = Mahasiswa::where('nim', auth()->user()->username)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Cek apakah mahasiswa sudah tergabung di kelas lain
        if ($mahasiswa->kode_kelas && $mahasiswa->kode_kelas !== $request->kode_kelas) {
            return redirect()->back()->with('error', 'Kamu sudah tergabung di kelas lain.');
        }

        // Jika belum tergabung, simpan kode_kelas
        if (!$mahasiswa->kode_kelas) {
            $mahasiswa->kode_kelas = $request->kode_kelas;
            $mahasiswa->save();
        }

        return redirect('/kelas')->with('success', 'Berhasil masuk ke kelas.');
    }


    public function index(Request $request)
    {
        // dd($request);
        $search = $request->input('search'); // Ambil nilai dari input 'search'

        if ($search) {
            $mahasiswa = Mahasiswa::where('nama', 'LIKE', '%' . $search . '%')
                                 ->orWhere('universitas', 'LIKE', '%' . $search . '%')
                                 ->orWhere('fakultas', 'LIKE', '%' . $search . '%')
                                 ->orWhere('prodi', 'LIKE', '%' . $search . '%')
                                 ->orWhere('kelompok', 'LIKE', '%' . $search . '%')
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

        public function showGabungPage()
    {
        $mahasiswa = Mahasiswa::where('nim', auth()->user()->username)->first(); 

        $kelas = null;
        if ($mahasiswa && $mahasiswa->kode_kelas) {
            $kelas = Kelas::with('mentor')->where('kode_kelas', $mahasiswa->kode_kelas)->first();
        }

        return view('gabung', compact('kelas'));
    }

}
