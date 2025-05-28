<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function store(Request $request)
{
    // validasi input
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
    ]);

    // simpan data ke database (asumsikan model Pengumuman sudah ada)
    \App\Models\Pengumuman::create($validated);
  
    // redirect ke halaman pengumuman dengan pesan sukses
    return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dibuat!');
}
public function index()
{
    $pengumuman = \App\Models\Pengumuman::all();  // ambil semua data pengumuman
    return view('pengumuman.index', compact('pengumuman'));
}


}