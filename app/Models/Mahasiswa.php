<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $primaryKey = 'nim';             
    public $incrementing = false;          
    protected $keyType = 'string';     
 
    protected $fillable = [
        'nim',
        'nama',
        'universitas',
        'fakultas',
        'prodi',
        'kelompok',
        'kode_kelas',
    ];
}
