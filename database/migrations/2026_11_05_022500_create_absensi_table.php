<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');

            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->unsignedBigInteger('id_impor');
            $table->date('tanggal_absen');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->string('status_kehadiran', 50);
            $table->text('keterangan_absen')->nullable();

            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();

            $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwal_shift')
                ->nullOnDelete();

            $table->foreign('id_impor')
                ->references('id_impor')
                ->on('impor_absensi')
                ->restrictOnDelete();

            $table->unique(['id_karyawan', 'tanggal_absen']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};