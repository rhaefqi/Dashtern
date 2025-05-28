<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman'; // pastikan ini sesuai nama tabel
    protected $fillable = ['judul', 'isi'];
}