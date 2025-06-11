<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'kode_kelas', 'kode_kelas');
    }

    public function tugas()
    {
        return $this->hasMany(TugasKelas::class, 'kode_kelas', 'kode_kelas');
    }
}
