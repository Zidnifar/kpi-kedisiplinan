<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periode_penilaian', function (Blueprint $table) {
            $table->id('id_periode');
            $table->string('nama_periode', 50);
            $table->integer('tahun');
            $table->unsignedTinyInteger('triwulan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status_periode', 50);
            $table->unique(['tahun', 'triwulan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periode_penilaian');
    }
};