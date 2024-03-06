<?php

namespace App\Models\Asrama;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HDetailTransaksiAsrama extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Transaksi_asrama_id',
        'hdta_sub_total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Transaksi_asrama_id' => 'integer',
        'hdta_sub_total' => 'decimal:2',
    ];

    public function rDetailTransaksiAsrama(): HasOne
    {
        return $this->hasOne(RDetailTransaksiAsrama::class);
    }

    public function transaksiAsrama(): BelongsTo
    {
        return $this->belongsTo(TransaksiAsrama::class);
    }
}
