<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NilaiSemester extends Model
{
    protected $table = 'nilai_semester';

    protected $primaryKey = 'id_nilai_semester';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'id_predikat',
        'id_hasil_tw_pertama',
        'id_hasil_tw_kedua',
        'tahun',
        'semester',
        'nilai_semester',
        'tanggal_hitung',
    ];

    protected function casts(): array
    {
        return [
            'tahun' => 'integer',
            'semester' => 'integer',
            'nilai_semester' => 'decimal:2',
            'tanggal_hitung' => 'datetime',
        ];
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function predikatNilai(): BelongsTo
    {
        return $this->belongsTo(PredikatNilai::class, 'id_predikat', 'id_predikat');
    }

    public function hasilTriwulanPertama(): BelongsTo
    {
        return $this->belongsTo(HasilKpi::class, 'id_hasil_tw_pertama', 'id_hasil');
    }

    public function hasilTriwulanKedua(): BelongsTo
    {
        return $this->belongsTo(HasilKpi::class, 'id_hasil_tw_kedua', 'id_hasil');
    }
}