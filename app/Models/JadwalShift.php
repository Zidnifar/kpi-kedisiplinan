<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalShift extends Model
{
    protected $table = 'jadwal_shift';

    protected $primaryKey = 'id_jadwal';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'id_shift',
        'tanggal_jadwal',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_jadwal' => 'date',
        ];
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function shiftKerja(): BelongsTo
    {
        return $this->belongsTo(ShiftKerja::class, 'id_shift', 'id_shift');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_jadwal', 'id_jadwal');
    }
}