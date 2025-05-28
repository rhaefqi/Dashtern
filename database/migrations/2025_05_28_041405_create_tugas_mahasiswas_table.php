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
        Schema::create('tugas_mahasiswas', function (Blueprint $table) {
            $table->char('kode_tugas');
            $table->foreign('kode_tugas')->references('kode_tugas')->on('tugas_kelas')->onDelete('restrict');
            $table->char('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswas')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->string('link_gdrive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_mahasiswas');
    }
};
