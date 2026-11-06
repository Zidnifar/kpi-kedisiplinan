<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImporAbsensi extends Model
{
    protected $table = 'impor_absensi';

    protected $primaryKey = 'id_impor';

    public $timestamps = false;

    protected $fillable = [
        'id_pengguna',
        'nama_file',
        'periode_impor',
        'tanggal_impor',
        'jumlah_baris',
        'status_impor',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_impor' => 'datetime',
        ];
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_impor', 'id_impor');
    }
}