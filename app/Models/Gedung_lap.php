<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GedungLap extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gl_foto',
        'gl_nama',
        'gl_keterangan',
        'gl_tarif',
        'gl_satuan_gedung',
        'gl_kapasitas_gedung',
        'gl_ukuran_gedung',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function transaksiGedungs(): HasMany
    {
        return $this->hasMany(TransaksiGedung::class);
    }
}
