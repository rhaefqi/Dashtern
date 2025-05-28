<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tugas_kelas', function (Blueprint $table) {
            $table->char('kode_tugas')->primary();
            $table->string('nama');
            $table->string('deskripsi');
            $table->date('tenggat');
            $table->string('lampiran');
            $table->string('kode_kelas');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('status', ['akuisi', 'sosialisasi', 'kunjungan', 'video', 'absensi', 'laporan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_kelas');
    }
};
