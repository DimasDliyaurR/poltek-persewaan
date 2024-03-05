<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AsramaId extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        's_nama_ruangan',
        's_status',
        's_tarif',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        's_tarif' => 'decimal:2',
    ];

    public function detailTransaksiIds(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function transaksiAsramas(): HasMany
    {
        return $this->hasMany(TransaksiAsrama::class);
    }

    public function rDetailTransaksiAsramas(): HasMany
    {
        return $this->hasMany(RDetailTransaksiAsrama::class);
    }
}
