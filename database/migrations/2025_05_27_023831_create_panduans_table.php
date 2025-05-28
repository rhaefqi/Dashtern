<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('panduans', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('link_drive');
        $table->timestamps();
    });
}

};
