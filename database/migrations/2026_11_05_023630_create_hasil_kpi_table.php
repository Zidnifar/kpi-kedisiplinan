<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_kpi', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_predikat')->nullable();
            $table->unsignedBigInteger('id_pemeriksa')->nullable();
            $table->unsignedBigInteger('id_pemvalidasi')->nullable();
            $table->integer('nilai_awal')->default(100);
            $table->integer('total_pengurang');
            $table->decimal('nilai_triwulan', 5, 2);
            $table->string('status_periksa', 30);
            $table->string('status_validasi', 30);
            $table->dateTime('tanggal_penilaian');
            $table->dateTime('tanggal_periksa')->nullable();
            $table->dateTime('tanggal_validasi')->nullable();

            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();

            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode_penilaian')
                ->restrictOnDelete();

            $table->foreign('id_predikat')
                ->references('id_predikat')
                ->on('predikat_nilai')
                ->nullOnDelete();

            $table->foreign('id_pemeriksa')
                ->references('id_pengguna')
                ->on('pengguna')
                ->nullOnDelete();

            $table->foreign('id_pemvalidasi')
                ->references('id_pengguna')
                ->on('pengguna')
                ->nullOnDelete();

            $table->unique(['id_karyawan', 'id_periode']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_kpi');
    }
};