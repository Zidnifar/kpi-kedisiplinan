<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndikatorKpi extends Model
{
    protected $table = 'indikator_kpi';

    protected $primaryKey = 'id_indikator';

    public $timestamps = false;

    protected $fillable = [
        'kode_indikator',
        'nama_indikator',
        'deskripsi',
        'bobot_poin',
        'status_indikator',
    ];

    protected function casts(): array
    {
        return [
            'bobot_poin' => 'integer',
        ];
    }

    public function pelanggaranKaryawan(): HasMany
    {
        return $this->hasMany(PelanggaranKaryawan::class, 'id_indikator', 'id_indikator');
    }

    public function detailPenilaianKpi(): HasMany
    {
        return $this->hasMany(DetailPenilaianKpi::class, 'id_indikator', 'id_indikator');
    }
}