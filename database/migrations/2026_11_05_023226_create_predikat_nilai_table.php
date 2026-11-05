<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('predikat_nilai', function (Blueprint $table) {
            $table->id('id_predikat');
            $table->string('nama_predikat', 30);
            $table->decimal('nilai_min', 5, 2);
            $table->decimal('nilai_max', 5, 2);
            $table->string('status_predikat', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('predikat_nilai');
    }
};