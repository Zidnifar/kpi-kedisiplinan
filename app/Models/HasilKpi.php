<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HasilKpi extends Model
{
    protected $table = 'hasil_kpi';

    protected $primaryKey = 'id_hasil';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'id_periode',
        'id_predikat',
        'id_pemeriksa',
        'id_pemvalidasi',
        'nilai_awal',
        'total_pengurang',
        'nilai_triwulan',
        'status_periksa',
        'status_validasi',
        'tanggal_penilaian',
        'tanggal_periksa',
        'tanggal_validasi',
    ];

    protected function casts(): array
    {
        return [
            'nilai_awal' => 'integer',
            'total_pengurang' => 'integer',
            'nilai_triwulan' => 'decimal:2',
            'tanggal_penilaian' => 'datetime',
            'tanggal_periksa' => 'datetime',
            'tanggal_validasi' => 'datetime',
        ];
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function periodePenilaian(): BelongsTo
    {
        return $this->belongsTo(PeriodePenilaian::class, 'id_periode', 'id_periode');
    }

    public function predikatNilai(): BelongsTo
    {
        return $this->belongsTo(PredikatNilai::class, 'id_predikat', 'id_predikat');
    }

    public function pemeriksa(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pemeriksa', 'id_pengguna');
    }

    public function pemvalidasi(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pemvalidasi', 'id_pengguna');
    }

    public function detailPenilaianKpi(): HasMany
    {
        return $this->hasMany(DetailPenilaianKpi::class, 'id_hasil', 'id_hasil');
    }
}