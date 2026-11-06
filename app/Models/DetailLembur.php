<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailLembur extends Model
{
    protected $table = 'detail_lembur';

    protected $primaryKey = 'id_detail_lembur';

    public $timestamps = false;

    protected $fillable = [
        'id_rencana',
        'id_karyawan',
        'jam_rencana',
        'pekerjaan',
        'id_pengisi',
        'jam_mulai_real',
        'jam_selesai_real',
        'total_jam',
        'catatan_realisasi',
        'tanggal_isi',
    ];

    protected function casts(): array
    {
        return [
            'jam_rencana' => 'decimal:1',
            'total_jam' => 'decimal:1',
            'tanggal_isi' => 'datetime',
        ];
    }

    public function rencanaLembur(): BelongsTo
    {
        return $this->belongsTo(RencanaLembur::class, 'id_rencana', 'id_rencana');
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function pengisi(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_pengisi', 'id_karyawan');
    }
}