<?php

namespace Database\Seeders;

use App\Models\TugasMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['akuisisi_pu', 'akuisisi_bpu', 'kunjungan_pu', 'kunjungan_bpu', 'laporan', 'video', 'absensi'];
        $nims = ['12345679', '12345680', '12345681', '12345682', '12345683', '12345684', '12345685', '12345686', '12345687'];

        for ($i = 0; $i < 40; $i++) {
            $status = $statuses[array_rand($statuses)];

            $jumlah = in_array($status, ['Akuisisi', 'Kunjungan'])
                ? rand(1, 10)
                : 1;

            TugasMahasiswa::create([
                'kode_tugas' => rand(1, 3),
                'nim' => $nims[array_rand($nims)],
                'status' => $status,
                'jumlah' => $jumlah,
                'link_gdrive' => 'https://drive.google.com/',
            ]);
        }

        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'akuisisi_pu',
            'jumlah' => 2,
            'link_gdrive' => 'https://drive.google.com/',
        ]);

        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'akuisisi_bpu',
            'jumlah' => 20,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'kunjungan_pu',
            'jumlah' => 10,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'kunjungan_bpu',
            'jumlah' => 15,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'absensi',
            'jumlah' => 8,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'laporan',
            'jumlah' => 4,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'video',
            'jumlah' => 2,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
        TugasMahasiswa::create([
            'kode_tugas' => 1,
            'nim' => '12345678',
            'status' => 'sosialisasi',
            'jumlah' => 2,
            'link_gdrive' => 'https://drive.google.com/',
        ]);
    }
}
