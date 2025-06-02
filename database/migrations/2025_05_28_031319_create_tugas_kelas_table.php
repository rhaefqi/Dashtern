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
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->date('tenggat');
            $table->string('lampiran')->nullable();
            $table->string('kode_kelas');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('status', ['akuisisi_pu', 'akuisisi_bpu', 'kunjungan_pu', 'kunjungan_bpu', 'sosialisasi', 'video', 'absensi', 'laporan']);
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
