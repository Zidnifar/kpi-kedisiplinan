<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('departemen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kepala_unit')
                ->nullable()
                ->unique();

            $table->foreign('id_kepala_unit')
                ->references('id_karyawan')
                ->on('karyawan')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('departemen', function (Blueprint $table) {
            $table->dropForeign(['id_kepala_unit']);
            $table->dropUnique(['id_kepala_unit']);
            $table->dropColumn('id_kepala_unit');
        });
    }
};