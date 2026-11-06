<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'id_karyawan';

    public $timestamps = false;

    protected $fillable = [
        'id_dept',
        'nip',
        'nama_karyawan',
        'jabatan',
        'status_karyawan',
        'no_hp',
        'email',
        'jenis_kelamin',
    ];

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class, 'id_dept', 'id_dept');
    }

    public function pengguna(): HasOne
    {
        return $this->hasOne(Pengguna::class, 'id_karyawan', 'id_karyawan');
    }

    public function kepalaDepartemen(): HasOne
    {
        return $this->hasOne(Departemen::class, 'id_kepala_unit', 'id_karyawan');
    }

    public function jadwalShift(): HasMany
    {
        return $this->hasMany(JadwalShift::class, 'id_karyawan', 'id_karyawan');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_karyawan', 'id_karyawan');
    }

    public function pelanggaran(): HasMany
    {
        return $this->hasMany(PelanggaranKaryawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function hasilKpi(): HasMany
    {
        return $this->hasMany(HasilKpi::class, 'id_karyawan', 'id_karyawan');
    }

    public function nilaiSemester(): HasMany
    {
        return $this->hasMany(NilaiSemester::class, 'id_karyawan', 'id_karyawan');
    }

    public function rencanaLembur(): HasMany
    {
        return $this->hasMany(RencanaLembur::class, 'id_pengaju', 'id_karyawan');
    }

    public function detailLembur(): HasMany
    {
        return $this->hasMany(DetailLembur::class, 'id_karyawan', 'id_karyawan');
    }
}