<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'user_id',
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
        'user_id' => 'integer',
        'tg_tanggal_sewa' => 'datetime',
        'tg_tanggal_kembali' => 'datetime',
        'tg_tanggal_pelaksanaan' => 'timestamp',
    ];

    public function detailTransaksiPropertyGedungs(): HasMany
    {
        return $this->hasMany(DetailTransaksiPropertyGedung::class);
    }

    public function detailTransaksiGedungs(): HasMany
    {
        return $this->hasMany(DetailTransaksiGedung::class);
    }

    public function gedungLap(): BelongsToMany
    {
        return $this->belongsToMany(GedungLap::class, "detail_transaksi_gedungs", "transaksi_gedung_id", "gedung_lap_id")
            ->using(DetailTransaksiGedung::class);
    }

    public function property(): BelongsToMany
    {
        return $this->belongsToMany(PropertyGedung::class, "detail_transaksi_property_gedungs", "transaksi_gedung_id", "property_gedung_id")
            ->using(DetailTransaksiGedung::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
