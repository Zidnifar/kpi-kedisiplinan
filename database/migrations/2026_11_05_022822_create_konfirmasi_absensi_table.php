<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konfirmasi_absensi', function (Blueprint $table) {
            $table->id('id_konfir');
            $table->unsignedBigInteger('id_absensi')->unique();
            $table->unsignedBigInteger('id_pemverifikasi')->nullable();
            $table->dateTime('tanggal_konfir');
            $table->string('jawaban_konfir', 30);
            $table->time('jam_masuk_koreksi')->nullable();
            $table->time('jam_pulang_koreksi')->nullable();
            $table->text('alasan')->nullable();
            $table->string('status_konfir', 50);
            $table->dateTime('tanggal_verifikasi')->nullable();
            $table->text('catatan_verifikasi')->nullable();

            $table->foreign('id_absensi')
                ->references('id_absensi')
                ->on('absensi')
                ->restrictOnDelete();

            $table->foreign('id_pemverifikasi')
                ->references('id_pengguna')
                ->on('pengguna')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_absensi');
    }
};