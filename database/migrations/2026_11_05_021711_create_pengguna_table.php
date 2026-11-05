<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->unsignedBigInteger('id_karyawan')
                ->nullable()
                ->unique();
            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawan')
                ->nullOnDelete();
            $table->string('username', 100)->unique();
            $table->string('password', 255);
            $table->string('role', 30);
            $table->string('status_akun', 20);
            $table->dateTime('dibuat_pada');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};