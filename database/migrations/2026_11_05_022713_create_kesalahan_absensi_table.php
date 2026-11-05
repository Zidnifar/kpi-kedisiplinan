<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kesalahan_absensi', function (Blueprint $table) {
            $table->id('id_kesalahan');
            $table->unsignedBigInteger('id_absensi');
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->string('jenis_kesalahan', 50);
            $table->string('status_perbaikan', 30);
            $table->text('catatan')->nullable();
            $table->dateTime('tanggal_perbaikan')->nullable();

            $table->foreign('id_absensi')
                ->references('id_absensi')
                ->on('absensi')
                ->restrictOnDelete();

            $table->foreign('id_pengguna')
                ->references('id_pengguna')
                ->on('pengguna')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kesalahan_absensi');
    }
};