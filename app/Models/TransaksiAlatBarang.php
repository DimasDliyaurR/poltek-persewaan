<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use App\Models\AlatBarang;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksiAlatBarang;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TransaksiAlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'promo_id',
        'code_unique',
        'tab_tanggal_pesanan',
        'tab_tanggal_kembali',
        'tab_keterangan',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'code_unique' => 'string',
    ];

    public function detailTransaksiAlatBarangs(): HasMany
    {
        return $this->hasMany(DetailTransaksiAlatBarang::class);
    }

    public function alatBarangs(): BelongsToMany
    {
        return $this->belongsToMany(AlatBarang::class, "detail_transaksi_alat_barangs", "transaksi_alat_barang_id", "alat_barang_id")
            ->using(DetailTransaksiAlatBarang::class)
            ->as("alatBarangs");
    }

    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function events(): MorphMany
    {
        return $this->morphMany(Event::class, 'eventable');
    }
}
