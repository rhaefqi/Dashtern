<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'kode_kelas' => 'EUSU2025', //E = even, O = Odd, kampus, tahun
            'nama' => 'Universitas Sumatera Utara',
            'bulan_mulai' => Carbon::now(),
            'periode' => 4,
        ]);

        Kelas::create([
            'kode_kelas' => 'EPMD2025', //E = even, O = Odd, kampus, tahun
            'nama' => 'Politeknik Negri Medan ',
            'bulan_mulai' => Carbon::now(),
            'periode' => 1,
        ]);
    }
}
