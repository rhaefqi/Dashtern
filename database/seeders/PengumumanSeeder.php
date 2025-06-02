<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengumuman::create([
            'judul' => 'pengumpulan tugas 1',
            'isi' => 'pengumpulan tugas 1 iyahhhhhhhhhhhhhhhhhhhhhhh',
            'lampiran' => '',
            'kode_kelas' => 'EUSU2025',
        ]);
        Pengumuman::create([
            'judul' => 'pengumpulan tugas 1',
            'isi' => 'pengumpulan tugas 2 woyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy',
            'lampiran' => '',
            'kode_kelas' => 'EUSU2025',
        ]);
    }
}
