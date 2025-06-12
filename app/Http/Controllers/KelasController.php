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
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->user_id)->first();

        if (!$mahasiswa) {
            return view('kelas')->with('kelas', null)->with('error', 'Mahasiswa tidak ditemukan');
        }

        $kelas = Kelas::where('kode_kelas', $mahasiswa->kode_kelas)->first();

        return view('kelas', compact('kelas'));
    }



    public function detail($kode)
    {
        $dataNilai = $this->nilaiMahasiswa4BulanChart($kode);
        $mahasiswa = $this->nilaiMahasiswa4Bulan($kode);
        $kelas = Kelas::with(['pengumuman', 'tugas'])->where('kode_kelas', $kode)->first();
        return view('admin.detailkelas', compact('kelas', 'pengumuman', 'tugas', 'mahasiswa'));
    }

    public function nilaiMahasiswa4BulanChart($kode_kelas)
    {
        $mahasiswas = Mahasiswa::where('kode_kelas', $kode_kelas)->pluck('nim');
        $tugas = TugasMahasiswa::whereIn('nim', $mahasiswas)->get();

        $nilaiMahasiswa = [];

        $tugas->each(function ($item) use (&$nilaiMahasiswa) {
            $nim = $item->nim;
            $bulan = Carbon::parse($item->created_at)->month;

            // Ambil hanya bulan 1, 2, 3 (jika kamu ingin 3 bulan pertama saja)
            // dd($bulan);
            if ($bulan == 1) $bulanKey = 'bulan1';
            elseif ($bulan == 2) $bulanKey = 'bulan2';
            elseif ($bulan == 3) $bulanKey = 'bulan3';
            else return;

            // Map status ke index array
            $statusMap = [
                'kunjungan_bpu' => 0,  // BPU
                'kunjungan_pu' => 1, // PU
                'laporan' => 2,
                'video' => 3,
            ];

            if (!isset($statusMap[$item->status])) return;

            $statusIndex = $statusMap[$item->status];

            // Inisialisasi kalau belum ada
            if (!isset($nilaiMahasiswa[$nim][$bulanKey])) {
                $nilaiMahasiswa[$nim][$bulanKey] = [0, 0, 0, 0];
            }

            // Tambahkan jumlah sesuai status
            $nilaiMahasiswa[$nim][$bulanKey][$statusIndex] += $item->jumlah;
        });

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

        $kelas->kode_kelas = $kode_kelas;
        $kelas->nama = $request->input('nama_kelas');
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
