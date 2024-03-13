<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merk_kendaraan_id',
        'k_plat',
        'k_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'merk_kendaraan_id' => 'integer',
    ];

    public function detailTransaksiKendaraans(): HasMany
    {
        return $this->hasMany(DetailTransaksiKendaraan::class);
    }

    public function merkKendaraan(): BelongsTo
    {
        return $this->belongsTo(MerkKendaraan::class);
    }
}
