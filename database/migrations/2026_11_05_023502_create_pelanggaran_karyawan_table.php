<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggaran_karyawan', function (Blueprint $table) {
            $table->id('id_pelanggaran');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_indikator');
            $table->unsignedBigInteger('id_absensi')->nullable();
            $table->unsignedBigInteger('id_pencatat')->nullable();
            $table->date('tanggal_pelanggaran');
            $table->string('sumber', 20);
            $table->text('keterangan')->nullable();

            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();

            $table->foreign('id_indikator')
                ->references('id_indikator')
                ->on('indikator_kpi')
                ->restrictOnDelete();

            $table->foreign('id_absensi')
                ->references('id_absensi')
                ->on('absensi')
                ->nullOnDelete();

            $table->foreign('id_pencatat')
                ->references('id_pengguna')
                ->on('pengguna')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggaran_karyawan');
    }
};