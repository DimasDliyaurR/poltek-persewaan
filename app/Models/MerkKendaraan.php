<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MerkKendaraan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mk_foto',
        'mk_merk',
        'mk_seri',
        'mk_tarif',
        'mk_kapasitas',
        'mk_deskripsi',
        'mk_bahan_bakar',
        'mk_slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function kendaraans(): HasMany
    {
        return $this->hasMany(Kendaraan::class, "merk_kendaraan_id", "id");
    }

    public function transaksiKendaraans(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiKendaraan::class);
    }
}
