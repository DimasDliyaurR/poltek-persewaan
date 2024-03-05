<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HDetailTransaksiLayanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Transaksi_layanan_id',
        'hdtl_sub_total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Transaksi_layanan_id' => 'integer',
    ];

    public function rDetailTransaksiLayanan(): HasOne
    {
        return $this->hasOne(RDetailTransaksiLayanan::class);
    }

    public function transaksiLayanan(): BelongsTo
    {
        return $this->belongsTo(TransaksiLayanan::class);
    }
}
