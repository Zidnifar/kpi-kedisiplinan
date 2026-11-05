<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persetujuan_lembur', function (Blueprint $table) {
            $table->id('id_persetujuan');
            $table->unsignedBigInteger('id_rencana');
            $table->unsignedBigInteger('id_pengguna');
            $table->string('tahap', 20);
            $table->string('status_persetujuan', 20);
            $table->text('catatan')->nullable();
            $table->dateTime('tanggal_proses');

            $table->foreign('id_rencana')
                ->references('id_rencana')
                ->on('rencana_lembur')
                ->restrictOnDelete();

            $table->foreign('id_pengguna')
                ->references('id_pengguna')
                ->on('pengguna')
                ->restrictOnDelete();

            $table->unique(['id_rencana', 'tahap']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persetujuan_lembur');
    }
};