<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HDetailTransaksiKendaraan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Transaksi_kendaraan_id',
        'hdtk_sub_total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Transaksi_kendaraan_id' => 'integer',
    ];

    public function rDetailTransaksiKendaraan(): HasOne
    {
        return $this->hasOne(RDetailTransaksiKendaraan::class);
    }

    public function transaksiKendaraan(): BelongsTo
    {
        return $this->belongsTo(TransaksiKendaraan::class);
    }
}
