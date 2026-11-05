<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('impor_absensi', function (Blueprint $table) {
            $table->id('id_impor');
            $table->unsignedBigInteger('id_pengguna');
            $table->string('nama_file', 100);
            $table->char('periode_impor', 7);
            $table->dateTime('tanggal_impor');
            $table->integer('jumlah_baris');
            $table->string('status_impor', 30);
            $table->foreign('id_pengguna')
                ->references('id_pengguna')
                ->on('pengguna')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('impor_absensi');
    }
};