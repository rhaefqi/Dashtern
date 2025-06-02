<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '12345678',
            'nama' => 'Asep',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345679',
            'nama' => 'Budi',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345680',
            'nama' => 'Cici',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345681',
            'nama' => 'Dedi',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345682',
            'nama' => 'Eka',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345683',
            'nama' => 'Fajar',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345684',
            'nama' => 'Gita',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345685',
            'nama' => 'Hadi',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345686',
            'nama' => 'Ika',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);

        Mahasiswa::create([
            'nim' => '12345687',
            'nama' => 'Joko',
            'universitas' => 'USU',
            'fakultas' => 'Fasilkom-TI',
            'prodi' => 'TI',
            'kelompok' => '5',
            'kode_kelas' => 'EUSU2025',
        ]);
    }
}
