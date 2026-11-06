<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KesalahanAbsensi extends Model
{
    protected $table = 'kesalahan_absensi';

    protected $primaryKey = 'id_kesalahan';

    public $timestamps = false;

    protected $fillable = [
        'id_absensi',
        'id_pengguna',
        'jenis_kesalahan',
        'status_perbaikan',
        'catatan',
        'tanggal_perbaikan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_perbaikan' => 'datetime',
        ];
    }

    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class, 'id_absensi', 'id_absensi');
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
}