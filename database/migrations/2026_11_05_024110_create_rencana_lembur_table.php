<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rencana_lembur', function (Blueprint $table) {
            $table->id('id_rencana');
            $table->unsignedBigInteger('id_dept');
            $table->unsignedBigInteger('id_pengaju');
            $table->string('no_pengajuan', 30)->unique();
            $table->date('tanggal_lembur');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->text('uraian_pekerjaan');
            $table->text('alasan_lembur');
            $table->string('status_rencana', 40);
            $table->dateTime('tanggal_pengajuan')->nullable();

            $table->foreign('id_dept')
                ->references('id_dept')
                ->on('departemen')
                ->restrictOnDelete();

            $table->foreign('id_pengaju')
                ->references('id_karyawan')
                ->on('karyawan')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rencana_lembur');
    }
};