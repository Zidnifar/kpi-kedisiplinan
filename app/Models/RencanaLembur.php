<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RencanaLembur extends Model
{
    protected $table = 'rencana_lembur';

    protected $primaryKey = 'id_rencana';

    public $timestamps = false;

    protected $fillable = [
        'id_dept',
        'id_pengaju',
        'no_pengajuan',
        'tanggal_lembur',
        'jam_mulai',
        'jam_selesai',
        'uraian_pekerjaan',
        'alasan_lembur',
        'status_rencana',
        'tanggal_pengajuan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lembur' => 'date',
            'tanggal_pengajuan' => 'datetime',
        ];
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class, 'id_dept', 'id_dept');
    }

    public function pengaju(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_pengaju', 'id_karyawan');
    }

    public function detailLembur(): HasMany
    {
        return $this->hasMany(DetailLembur::class, 'id_rencana', 'id_rencana');
    }

    public function persetujuanLembur(): HasMany
    {
        return $this->hasMany(PersetujuanLembur::class, 'id_rencana', 'id_rencana');
    }
}