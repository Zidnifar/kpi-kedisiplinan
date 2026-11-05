<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->unsignedBigInteger('id_dept');
            $table->foreign('id_dept')
                ->references('id_dept')
                ->on('departemen')
                ->restrictOnDelete();

            $table->string('nip', 20)->nullable()->unique();
            $table->string('nama_karyawan', 100);
            $table->string('jabatan', 100);
            $table->string('status_karyawan', 20);
            $table->string('no_hp', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->char('jenis_kelamin', 1)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};