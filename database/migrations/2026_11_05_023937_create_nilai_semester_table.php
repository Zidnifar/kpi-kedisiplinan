<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_semester', function (Blueprint $table) {
            $table->id('id_nilai_semester');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_predikat')->nullable();
            $table->unsignedBigInteger('id_hasil_tw_pertama')->unique();
            $table->unsignedBigInteger('id_hasil_tw_kedua')->unique();
            $table->integer('tahun');
            $table->unsignedTinyInteger('semester');
            $table->decimal('nilai_semester', 5, 2);
            $table->dateTime('tanggal_hitung');

            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();

            $table->foreign('id_predikat')
                ->references('id_predikat')
                ->on('predikat_nilai')
                ->nullOnDelete();

            $table->foreign('id_hasil_tw_pertama')
                ->references('id_hasil')
                ->on('hasil_kpi')
                ->restrictOnDelete();

            $table->foreign('id_hasil_tw_kedua')
                ->references('id_hasil')
                ->on('hasil_kpi')
                ->restrictOnDelete();

            $table->unique(['id_karyawan', 'tahun', 'semester']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_semester');
    }
};