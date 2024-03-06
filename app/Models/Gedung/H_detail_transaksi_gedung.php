<?php

namespace App\Models\Gedung;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HDetailTransaksiGedung extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Transaksi_gedung_id',
        'Gedung_lap_id',
        'hdtg_sub_total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Transaksi_gedung_id' => 'integer',
        'Gedung_lap_id' => 'integer',
        'hdtg_sub_total' => 'decimal:2',
    ];

    public function rDetailTransaksiGedung(): HasOne
    {
        return $this->hasOne(RDetailTransaksiGedung::class);
    }

    public function transaksiGedung(): BelongsTo
    {
        return $this->belongsTo(TransaksiGedung::class);
    }

    public function gedungLap(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }
}
