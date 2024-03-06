<?php

namespace App\Models\Layanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RDetailTransaksiLayanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_transaksi_id',
        'Transaksi_layanan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'detail_transaksi_id' => 'integer',
        'Transaksi_layanan_id' => 'integer',
    ];

    public function detailTransaksi(): BelongsTo
    {
        return $this->belongsTo(HDetailTransaksiLayanan::class);
    }

    public function transaksiLayanan(): BelongsTo
    {
        return $this->belongsTo(TransaksiLayanan::class);
    }
}
