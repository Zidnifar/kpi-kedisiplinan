<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'username',
        'password',
        'role',
        'status_akun',
        'dibuat_pada',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'dibuat_pada' => 'datetime',
        ];
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function imporAbsensi(): HasMany
    {
        return $this->hasMany(ImporAbsensi::class, 'id_pengguna', 'id_pengguna');
    }

    public function kesalahanAbsensi(): HasMany
    {
        return $this->hasMany(KesalahanAbsensi::class, 'id_pengguna', 'id_pengguna');
    }

    public function konfirmasiAbsensi(): HasMany
    {
        return $this->hasMany(KonfirmasiAbsensi::class, 'id_pemverifikasi', 'id_pengguna');
    }

    public function pelanggaranDicatat(): HasMany
    {
        return $this->hasMany(PelanggaranKaryawan::class, 'id_pencatat', 'id_pengguna');
    }

    public function hasilKpiDiperiksa(): HasMany
    {
        return $this->hasMany(HasilKpi::class, 'id_pemeriksa', 'id_pengguna');
    }

    public function hasilKpiDivalidasi(): HasMany
    {
        return $this->hasMany(HasilKpi::class, 'id_pemvalidasi', 'id_pengguna');
    }

    public function persetujuanLembur(): HasMany
    {
        return $this->hasMany(PersetujuanLembur::class, 'id_pengguna', 'id_pengguna');
    }
}