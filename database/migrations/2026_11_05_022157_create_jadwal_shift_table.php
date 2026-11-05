<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_shift', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_shift');
            $table->date('tanggal_jadwal');
            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();
            $table->foreign('id_shift')
                ->references('id_shift')
                ->on('shift_kerja')
                ->restrictOnDelete();
            $table->unique(['id_karyawan', 'tanggal_jadwal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_shift');
    }
};