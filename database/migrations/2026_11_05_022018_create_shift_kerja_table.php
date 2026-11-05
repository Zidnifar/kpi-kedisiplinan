<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shift_kerja', function (Blueprint $table) {
            $table->id('id_shift');
            $table->string('kode_shift', 10)->unique();
            $table->string('nama_shift', 50);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('toleransi_menit');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shift_kerja');
    }
};