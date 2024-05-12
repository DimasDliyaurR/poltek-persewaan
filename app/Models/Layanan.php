<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Layanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'l_foto',
        'l_nama',
        'l_tarif',
        'l_personil',
        'l_satuan',
        'l_status',
        'l_slug',
        'l_deskripsi',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'l_personil' => 'boolean',
    ];

    public function timLayanans(): HasMany
    {
        return $this->hasMany(TimLayanan::class);
    }

    public function detailFotoLayanans(): HasMany
    {
        return $this->hasMany(DetailFotoLayanan::class);
    }

    public function detailTransaksiLayanans(): HasMany
    {
        return $this->hasMany(DetailTransaksiLayanan::class);
    }

    public function videoLayanans(): HasMany
    {
        return $this->hasMany(VideoLayanan::class);
    }

    public function transaksiLayanans(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiLayanan::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(LayananPaymentMethod::class);
    }
}
