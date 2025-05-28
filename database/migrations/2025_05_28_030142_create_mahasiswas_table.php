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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('nim', 11)->primary();
            $table->string('nama');
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('kode_kelas')->nullable();
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
