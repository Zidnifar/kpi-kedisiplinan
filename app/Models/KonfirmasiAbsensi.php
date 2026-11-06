<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KonfirmasiAbsensi extends Model
{
    protected $table = 'konfirmasi_absensi';

    protected $primaryKey = 'id_konfir';

    public $timestamps = false;

    protected $fillable = [
        'id_absensi',
        'id_pemverifikasi',
        'tanggal_konfir',
        'jawaban_konfir',
        'jam_masuk_koreksi',
        'jam_pulang_koreksi',
        'alasan',
        'status_konfir',
        'tanggal_verifikasi',
        'catatan_verifikasi',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_konfir' => 'datetime',
            'tanggal_verifikasi' => 'datetime',
        ];
    }

    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class, 'id_absensi', 'id_absensi');
    }

    public function pemverifikasi(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pemverifikasi', 'id_pengguna');
    }
}