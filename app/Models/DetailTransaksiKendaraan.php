<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailTransaksiKendaraan extends Pivot
{
    use HasFactory;

    protected $table = "detail_transaksi_kendaraans";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_kendaraan_id',
        'kendaraan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_kendaraan_id' => 'integer',
        'kendaraan_id' => 'integer',
    ];

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function transaksiKendaraan(): BelongsTo
    {
        return $this->belongsTo(TransaksiKendaraan::class);
    }
}
