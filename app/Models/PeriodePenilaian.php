<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodePenilaian extends Model
{
    protected $table = 'periode_penilaian';

    protected $primaryKey = 'id_periode';

    public $timestamps = false;

    protected $fillable = [
        'nama_periode',
        'tahun',
        'triwulan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_periode',
    ];

    protected function casts(): array
    {
        return [
            'tahun' => 'integer',
            'triwulan' => 'integer',
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }

    public function hasilKpi(): HasMany
    {
        return $this->hasMany(HasilKpi::class, 'id_periode', 'id_periode');
    }
}