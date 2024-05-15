<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailTransaksiLayanan extends Pivot
{
    use HasFactory;
    protected $table = "detail_transaksi_layanans";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_layanan_id',
        'layanan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaksi_layanan_id' => 'integer',
        'layanan_id' => 'integer',
    ];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function transaksiLayanan(): BelongsTo
    {
        return $this->belongsTo(TransaksiLayanan::class);
    }
}
