<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksiKendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan_transaksi_kendaraan";

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
