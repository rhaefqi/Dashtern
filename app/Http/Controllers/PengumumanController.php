<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
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
    $validated['kode_kelas'] = $request->input('kode_kelas');

    // simpan data ke database (asumsikan model Pengumuman sudah ada)
    Pengumuman::create($validated);
  
    // redirect ke halaman pengumuman dengan pesan sukses
    // return view('admin.detailkelas', compact('kelas', 'pengumuman'));
    return redirect()->back()->with('success', 'Pengumuman berhasil dibuat!');
}

public function destroy ($id){
    $pengumuman = Pengumuman::findOrFail($id);
    $pengumuman->delete();
    return redirect()->back()->with('success', 'Pengumuman berhasil dihapus!');
}

public function index()
{
    $pengumuman = Pengumuman::all();  // ambil semua data pengumuman
    return view('pengumuman.index', compact('pengumuman'));
}


}