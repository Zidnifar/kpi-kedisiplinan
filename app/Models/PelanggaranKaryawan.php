<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PelanggaranKaryawan extends Model
{
    protected $table = 'pelanggaran_karyawan';

    protected $primaryKey = 'id_pelanggaran';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'id_indikator',
        'id_absensi',
        'id_pencatat',
        'tanggal_pelanggaran',
        'sumber',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pelanggaran' => 'date',
        ];
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function indikatorKpi(): BelongsTo
    {
        return $this->belongsTo(IndikatorKpi::class, 'id_indikator', 'id_indikator');
    }

    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class, 'id_absensi', 'id_absensi');
    }

    public function pencatat(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pencatat', 'id_pengguna');
    }
}