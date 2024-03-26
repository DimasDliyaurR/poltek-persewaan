<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksiGedung extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_gedung_id',
        'gedung_lap_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_gedung_id' => 'integer',
        'gedung_lap_id' => 'integer',
    ];

    public function gedungLap(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }

    public function transaksiGedung(): BelongsTo
    {
        return $this->belongsTo(Transaksigedung::class);
    }
}
