<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_penilaian_kpi', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_hasil');
            $table->unsignedBigInteger('id_indikator');
            $table->integer('frekuensi');
            $table->integer('bobot_poin');
            $table->integer('total_pengurang');

            $table->foreign('id_hasil')
                ->references('id_hasil')
                ->on('hasil_kpi')
                ->restrictOnDelete();

            $table->foreign('id_indikator')
                ->references('id_indikator')
                ->on('indikator_kpi')
                ->restrictOnDelete();

            $table->unique(['id_hasil', 'id_indikator']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_penilaian_kpi');
    }
};