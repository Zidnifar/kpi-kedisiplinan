<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indikator_kpi', function (Blueprint $table) {
            $table->id('id_indikator');
            $table->string('kode_indikator', 10)->unique();
            $table->string('nama_indikator', 100);
            $table->text('deskripsi')->nullable();
            $table->integer('bobot_poin');
            $table->string('status_indikator', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indikator_kpi');
    }
};