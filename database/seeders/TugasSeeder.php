<?php

namespace Database\Seeders;

use App\Models\TugasKelas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TugasKelas::create([
            'nama' => 'Tugas 1',
            'deskripsi' => 'Tugas 1',
            'tenggat' => Carbon::now()->addDays(30),
            'lampiran' => '',
            'kode_kelas' => 'EUSU2025',
            'status' => 'akuisisi_pu',
        ]);
        TugasKelas::create([
            'nama' => 'Tugas 2',
            'deskripsi' => 'Tugas 2',
            'tenggat' => Carbon::now()->addDays(20),
            'lampiran' => '',
            'kode_kelas' => 'EUSU2025',
            'status' => 'kunjungan_pu',
        ]);
        TugasKelas::create([
            'nama' => 'Tugas 2',
            'deskripsi' => 'Tugas 2',
            'tenggat' => Carbon::now()->addDays(20),
            'lampiran' => '',
            'kode_kelas' => 'EUSU2025',
            'status' => 'kunjungan_bpu',
        ]);
        TugasKelas::create([
            'nama' => 'Tugas 3',
            'deskripsi' => 'Tugas 3',
            'tenggat' => Carbon::now()->addDays(10),
            'lampiran' => '',
            'kode_kelas' => 'EUSU2025',
            'status' => 'akuisisi_bpu',
        ]);
    }
}
