<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiGedung extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id',
        'Gedung_lap_id',
        'tg_tujuan',
        'tg_tanggal_sewa',
        'tg_tanggal_kembali',
        'tg_tanggal_pelaksanaan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'User_id' => 'integer',
        'Gedung_lap_id' => 'integer',
        'tg_tanggal_sewa' => 'datetime',
        'tg_tanggal_kembali' => 'datetime',
        'tg_tanggal_pelaksanaan' => 'timestamp',
    ];

    public function hDetailTransaksiGedungs(): HasMany
    {
        return $this->hasMany(HDetailTransaksiGedung::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function gedungLap(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }
}
