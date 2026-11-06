<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenilaianKpi extends Model
{
    protected $table = 'detail_penilaian_kpi';

    protected $primaryKey = 'id_detail';

    public $timestamps = false;

    protected $fillable = [
        'id_hasil',
        'id_indikator',
        'frekuensi',
        'bobot_poin',
        'total_pengurang',
    ];

    protected function casts(): array
    {
        return [
            'frekuensi' => 'integer',
            'bobot_poin' => 'integer',
            'total_pengurang' => 'integer',
        ];
    }

    public function hasilKpi(): BelongsTo
    {
        return $this->belongsTo(HasilKpi::class, 'id_hasil', 'id_hasil');
    }

    public function indikatorKpi(): BelongsTo
    {
        return $this->belongsTo(IndikatorKpi::class, 'id_indikator', 'id_indikator');
    }
}