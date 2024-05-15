<?php

namespace App\Models;

use App\Models\User;
use App\Models\Layanan;
use App\Models\DetailTransaksiLayanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TransaksiLayanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tl_tanggal_sewa',
        'tl_tanggal_pelaksanaan',
        'tl_durasi_sewa',
        'tl_tujuan',
        'tl_is_only_property',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tl_tanggal_sewa' => 'datetime',
        'tl_tanggal_pelaksanaan' => 'datetime',
        'tl_is_only_property' => 'boolean',
    ];

    public function detailTransaksiLayanans(): HasMany
    {
        return $this->hasMany(DetailTransaksiLayanan::class);
    }

    public function layanans(): BelongsToMany
    {
        return $this->belongsToMany(Layanan::class, "detail_transaksi_layanans", "transaksi_layanan_id", "layanan_id")
            ->using(DetailTransaksiLayanan::class)
            ->as("layanan");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function events() : MorphMany
    {
        return $this->morphMany(Event::class, 'eventable');
    }
}
