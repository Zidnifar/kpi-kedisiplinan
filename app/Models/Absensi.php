<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $primaryKey = 'id_absensi';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'id_jadwal',
        'id_impor',
        'tanggal_absen',
        'jam_masuk',
        'jam_pulang',
        'status_kehadiran',
        'keterangan_absen',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_absen' => 'date',
        ];
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function jadwalShift(): BelongsTo
    {
        return $this->belongsTo(JadwalShift::class, 'id_jadwal', 'id_jadwal');
    }

    public function imporAbsensi(): BelongsTo
    {
        return $this->belongsTo(ImporAbsensi::class, 'id_impor', 'id_impor');
    }

    public function kesalahanAbsensi(): HasMany
    {
        return $this->hasMany(KesalahanAbsensi::class, 'id_absensi', 'id_absensi');
    }

    public function konfirmasiAbsensi(): HasOne
    {
        return $this->hasOne(KonfirmasiAbsensi::class, 'id_absensi', 'id_absensi');
    }

    public function pelanggaran(): HasMany
    {
        return $this->hasMany(PelanggaranKaryawan::class, 'id_absensi', 'id_absensi');
    }
}