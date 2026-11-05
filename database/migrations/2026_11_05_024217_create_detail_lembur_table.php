<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_lembur', function (Blueprint $table) {
            $table->id('id_detail_lembur');
            $table->unsignedBigInteger('id_rencana');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_pengisi')->nullable();
            $table->decimal('jam_rencana', 4, 1);
            $table->string('pekerjaan', 100)->nullable();
            $table->time('jam_mulai_real')->nullable();
            $table->time('jam_selesai_real')->nullable();
            $table->decimal('total_jam', 4, 1)->nullable();
            $table->text('catatan_realisasi')->nullable();
            $table->dateTime('tanggal_isi')->nullable();

            $table->foreign('id_rencana')
                ->references('id_rencana')
                ->on('rencana_lembur')
                ->restrictOnDelete();

            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();

            $table->foreign('id_pengisi')
                ->references('id_karyawan')
                ->on('karyawan')
                ->nullOnDelete();

            $table->unique(['id_rencana', 'id_karyawan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_lembur');
    }
};