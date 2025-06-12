<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasKelas extends Model
{
    use HasFactory;
    

    protected $fillable = ['nama', 'deskripsi', 'tenggat', 'kode_kelas', 'status', 'lampiran'];
}
