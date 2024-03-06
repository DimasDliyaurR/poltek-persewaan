<?php

namespace App\Models\alatBarang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HDetailTransaksiAlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Transaksi_alat_barang_id',
        'hdtab_sub_total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Transaksi_alat_barang_id' => 'integer',
        'hdtab_sub_total' => 'decimal:2',
    ];

    public function transaksiAlatBarang(): BelongsTo
    {
        return $this->belongsTo(TransaksiAlatBarang::class);
    }
}
