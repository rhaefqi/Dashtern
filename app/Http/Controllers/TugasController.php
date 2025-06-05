<?php

namespace App\Http\Controllers;

use App\Models\TugasKelas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
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
        return view('tugas.detail', compact('tugas'));
    }       

    public function destroy ($id){
        $tugas = TugasKelas::findOrFail($id);
        $tugas->delete();
        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }
}
