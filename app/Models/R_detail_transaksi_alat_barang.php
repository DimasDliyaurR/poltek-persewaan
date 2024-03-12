<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RDetailTransaksiAlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_transaksi_id',
        'Alat_barang_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'detail_transaksi_id' => 'integer',
        'Alat_barang_id' => 'integer',
    ];

    public function detailTransaksi(): BelongsTo
    {
        return $this->belongsTo(HDetailTransaksiAlatBarang::class);
    }

    public function alatBarang(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }
}
