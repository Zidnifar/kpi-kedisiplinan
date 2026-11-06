<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PredikatNilai extends Model
{
    protected $table = 'predikat_nilai';

    protected $primaryKey = 'id_predikat';

    public $timestamps = false;

    protected $fillable = [
        'nama_predikat',
        'nilai_min',
        'nilai_max',
        'status_predikat',
    ];

    protected function casts(): array
    {
        return [
            'nilai_min' => 'decimal:2',
            'nilai_max' => 'decimal:2',
        ];
    }

    public function hasilKpi(): HasMany
    {
        return $this->hasMany(HasilKpi::class, 'id_predikat', 'id_predikat');
    }

    public function nilaiSemester(): HasMany
    {
        return $this->hasMany(NilaiSemester::class, 'id_predikat', 'id_predikat');
    }
}