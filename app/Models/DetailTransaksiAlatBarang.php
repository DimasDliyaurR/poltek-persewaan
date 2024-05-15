<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailTransaksiAlatBarang extends Pivot
{
    use HasFactory;

    protected $table = "detail_transaksi_alat_barangs";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_alat_barang_id',
        'alat_barang_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaksi_alat_barang_id' => 'integer',
        'alat_barang_id' => 'integer',
    ];

    public function alatBarang(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }

    public function transaksiAlatBarang(): BelongsTo
    {
        return $this->belongsTo(TransaksiAlatBarang::class);
    }
}
