<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShiftKerja extends Model
{
    protected $table = 'shift_kerja';

    protected $primaryKey = 'id_shift';

    public $timestamps = false;

    protected $fillable = [
        'kode_shift',
        'nama_shift',
        'jam_mulai',
        'jam_selesai',
        'toleransi_menit',
    ];

    public function jadwalShift(): HasMany
    {
        return $this->hasMany(JadwalShift::class, 'id_shift', 'id_shift');
    }
}