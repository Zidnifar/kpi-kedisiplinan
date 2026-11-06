<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersetujuanLembur extends Model
{
    protected $table = 'persetujuan_lembur';

    protected $primaryKey = 'id_persetujuan';

    public $timestamps = false;

    protected $fillable = [
        'id_rencana',
        'id_pengguna',
        'tahap',
        'status_persetujuan',
        'catatan',
        'tanggal_proses',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_proses' => 'datetime',
        ];
    }

    public function rencanaLembur(): BelongsTo
    {
        return $this->belongsTo(RencanaLembur::class, 'id_rencana', 'id_rencana');
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
}