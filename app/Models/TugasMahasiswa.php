<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasMahasiswa extends Model
{
    use HasFactory;
protected $table = 'tugas_mahasiswas';

    protected $fillable = [
        'kode_tugas',
        'nim',
        'jumlah',
        'link_gdrive',
        'status',
    ];
}
