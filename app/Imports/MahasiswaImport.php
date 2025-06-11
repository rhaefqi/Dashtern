<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $mahasiswa = Mahasiswa::where('nim', $row['nim'])->first();
            if ($mahasiswa) {
                $mahasiswa::where('nim', $row['nim'])->update([
                    'nama' => $row['nama'],
                    'universitas' => $row['universitas'],
                    'fakultas' => $row['fakultas'],
                    'prodi' => $row['jurusan'],
                    'kelompok' => $row['kelompok'],
                ]);
            } else {
                Mahasiswa::create([
                    'nim' => $row['nim'],
                    'nama' => $row['nama'],
                    'universitas' => $row['universitas'],
                    'fakultas' => $row['fakultas'],
                    'prodi' => $row['jurusan'],
                    'kelompok' => $row['kelompok'],
                ]);
            }
        }
    }
}
