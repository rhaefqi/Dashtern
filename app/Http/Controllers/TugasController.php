<?php

namespace App\Http\Controllers;

use App\Models\TugasKelas;
use App\Models\Kelas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\TugasMahasiswa;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class TugasController extends Controller
{
    public function index($kode_kelas)
    {
        // Ambil info kelas
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->firstOrFail();

        // Ambil semua tugas berdasarkan kode_kelas
        $tugas = TugasKelas::where('kode_kelas', $kode_kelas)->get();

        // Ambil semua pengumuman berdasarkan kode_kelas
        $pengumuman = Pengumuman::where('kode_kelas', $kode_kelas)->get();

        return view('tugas', compact('kelas', 'tugas', 'pengumuman'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tenggat' => 'required|date',
                'status' => 'required|string',
            ]);
        }catch (\Throwable $th) {
            dd($th);   
        }
        $validated['kode_kelas'] = $request->input('kode_kelas');

        TugasKelas::create($validated);

        return redirect()->back()->with('success', 'Tugas berhasil dibuat!');
    }

    public function detail($id)
    {
        $tugas = TugasKelas::findOrFail($id);
        return view('detail', compact('tugas'));
    }       

    public function destroy ($id){
        $tugas = TugasKelas::findOrFail($id);
        $tugas->delete();
        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }

    public function form($id)
    {
        $tugas = TugasKelas::findOrFail($id);
        return view('form-tugas', compact('tugas'));
    }

public function submit(Request $request)
{
    $request->validate([
        'kode_tugas' => 'required|exists:tugas_kelas,id',
        'jumlah' => 'required|integer|min:1',
        'link_gdrive' => 'required|url',
        'status' => 'required',
    ]);

    $nim = auth()->user()->username; 
    $mahasiswa = Mahasiswa::where('nim', $nim)->first();

    DB::table('tugas_mahasiswas')->insert([
        'kode_tugas' => $request->kode_tugas,
        'nim' => $mahasiswa->nim,
        'jumlah' => $request->jumlah,
        'link_gdrive' => $request->link_gdrive,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('tugas.detail', $request->kode_tugas)
    ->with('success', 'Tugas berhasil dikumpulkan!');

}

}
