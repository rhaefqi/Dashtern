<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panduan;

class PanduanController extends Controller
{
    // Tampilkan untuk mahasiswa
    public function indexMahasiswa()
    {
         $panduans = Panduan::all(); 
        return view('panduan', compact('panduans'));
    }

    // Tampilkan untuk admin
    public function indexAdmin()
    {
        $panduans = Panduan::latest()->get();
        return view('admin.panduan', compact('panduans'));
    }

    // Simpan data dari admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'link_drive' => 'required|url',
        ]);

        Panduan::create($validated);

        return redirect()->back()->with('success', 'Panduan berhasil disimpan.');
    }

    public function destroy($id)
    {
    $panduan = Panduan::findOrFail($id);
    $panduan->delete();

    return redirect()->back()->with('success', 'Panduan berhasil dihapus.');
    }


    // API jika dibutuhkan
    public function listJson()
    {
        return Panduan::all();
    }
}
