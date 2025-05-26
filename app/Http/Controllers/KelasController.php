<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $tugas = Tugas::where('kelas_id', $id)->get();

        return view('admin.detailkelas', compact('kelas', 'tugas'));
    }
    // Menampilkan halaman daftar kelas
    public function index()
    {
        return view('admin.kelas');
    }

    // Menampilkan form untuk membuat kelas
    public function create()
    {
        return view('admin.create');
    }
}
