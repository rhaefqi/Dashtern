<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Pengumuman;
use App\Models\TugasKelas;
use App\Models\TugasMahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $tugas = TugasKelas::where('kelas_id', $id)->get();

        return view('admin.detailkelas', compact('kelas', 'tugas'));
    }
    // Menampilkan halaman daftar kelas
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas', compact('kelas'));
    }

    public function indexMahasiswa()
    {
       $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan');
        }
        $kelas = Kelas::where('kode_kelas', $mahasiswa->kode_kelas)->first();
        return view('kelas', compact('kelas'));
    }

    public function detail($kode)
    {
        $dataNilai = $this->nilaiMahasiswa4BulanChart($kode);
        $mahasiswa = $this->nilaiMahasiswa4Bulan($kode);
        $kelas = Kelas::with(['pengumuman', 'tugas'])->where('kode_kelas', $kode)->first();
        $tugas = TugasKelas::where('kode_kelas', $kode)->get();
        $pengumuman = Pengumuman::where('kode_kelas', $kode)->get();
        return view('admin.detailkelas', compact('kelas', 'pengumuman', 'tugas', 'mahasiswa', 'dataNilai'));
    }

    public function nilaiMahasiswa4BulanChart($kode_kelas)
    {
        $tugas = TugasMahasiswa::select('nim', 'status', 'jumlah', 'created_at')->get();

        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $bulanMulai = Carbon::parse($kelas->bulan_mulai)->month;

        $nilaiMahasiswa = [];

        foreach ($tugas as $item) {
            $nim = $item->nim;
            $bulan = Carbon::parse($item->created_at)->month;

            $offset = $bulan - $bulanMulai;

            // Hanya proses 3 bulan awal (bulan1, bulan2, bulan3)
            if ($offset < 0 || $offset > 2) continue;

            $bulanKey = 'bulan' . ($offset + 1); // bulan1, bulan2, atau bulan3

            // Mapping status ke indeks array
            $statusMap = [
                'kunjungan_bpu' => 0,  // BPU
                'kunjungan_pu' => 1,   // PU
                'laporan' => 2,
                'video' => 3,
            ];

            if (!isset($statusMap[$item->status])) continue;

            $statusIndex = $statusMap[$item->status];

            // Inisialisasi array jika belum ada
            if (!isset($nilaiMahasiswa[$nim][$bulanKey])) {
                $nilaiMahasiswa[$nim][$bulanKey] = [0, 0, 0, 0];
            }

            // Tambahkan jumlah ke indeks yang sesuai
            $nilaiMahasiswa[$nim][$bulanKey][$statusIndex] += $item->jumlah;
        }

        return $nilaiMahasiswa;
    }

    public function nilaiMahasiswa4Bulan($kode_kelas)
    {
        $mahasiswa = Mahasiswa::where('kode_kelas', $kode_kelas)->get();

        foreach ($mahasiswa as $m) {
            $tugas = TugasMahasiswa::where('nim', $m->nim)->get();
            $nilai = 0;
            foreach ($tugas as $t) {
                switch ($t->status) {
                    case "kunjungan_pu":
                        $nilai += $t->jumlah * 0.5;
                        break;
                    case "kunjungan_bpu":
                        $nilai += $t->jumlah * 0.5;
                        break;
                    case "akuisisi_pu":
                        $nilai += $t->jumlah * 5;
                        break;
                    case "akuisisi_bpu":
                        $nilai += $t->jumlah * 0.5;
                        break;
                    case "video":
                        $nilai += $t->jumlah * 5;;
                        break;
                    case "absensi":
                        $nilai += $t->jumlah * 1.5;;
                        break;
                    case "laporan":
                        $nilai += $t->jumlah * 2;;
                        break;
                    case "sosialisasi":
                        $nilai += $t->jumlah * 5;;
                        break;
                    default:
                        $nilai += 0;
                        break;
                }
            }
            $m->total_nilai = $nilai;
        }

        return $mahasiswa;
    }

    // Menampilkan form untuk membuat kelas
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'durasi' => 'required|string|max:50'
        ]);

        $kelas = new Kelas();

        $kode_dasar = $this->buatKodeKelas($request->input('nama_kelas'));

        $all_kode = Kelas::pluck('kode_kelas')->toArray();

        $counter = 1;
        $kode_kelas = $counter . $kode_dasar;

        // Ulangi sampai dapat kode yang belum dipakai
        while (in_array($kode_kelas, $all_kode)) {
            $counter++;
            $kode_kelas = $counter . $kode_dasar;
        }
        // $bulan_mulai = $request->input('bulan_mulai');
        $kelas->kode_kelas = $kode_kelas;
        $kelas->nama = $request->input('nama_kelas');
        $kelas->bulan_mulai = $request->input('bulan_mulai');
        $kelas->periode = $request->input('durasi');
        $kelas->save();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dibuat!');
    }

    public function destroy($kode_kelas)
    {
        $kelas = Kelas::where('kode_kelas', $kode_kelas);
        try {
            $kelas->delete();
        } catch (\Throwable $th) {
            return back()->with('failed', 'Kelas tidak dapat dihapus!');
        }
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }

    public function buatKodeKelas($nama_universitas)
    {
        $kata = explode(' ', $nama_universitas);
        $kode = '';
        // dd($kata);

        foreach ($kata as $k) {
            $kode .= strtoupper($k[0]);
        }
        $tahun = Carbon::now()->year;
        $kode .= $tahun;

        return $kode;
    }
}
