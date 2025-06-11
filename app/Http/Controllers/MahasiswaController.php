<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
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
