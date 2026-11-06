<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id_dept';
    public $timestamps = false;
    protected $fillable = [
        'nama_dept',
        'id_kepala_unit',
    ];      

    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'id_dept', 'id_dept');
    }

    public function kepalaUnit(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_kepala_unit', 'id_karyawan');
    }
}