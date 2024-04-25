<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    public function transaksiAsramas(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiAsrama::class);
    }

    public function transaksiAlatBarangs(): HasMany
    {
        return $this->hasMany(TransaksiAlatBarang::class);
    }

    public function transaksiGedungLap(): HasMany
    {
        return $this->hasMany(TransaksiGedung::class);
    }

    public function transaksiKendaraan(): HasMany
    {
        return $this->hasMany(TransaksiKendaraan::class);
    }

    public function transaksiLayanan(): HasMany
    {
        return $this->hasMany(TransaksiLayanan::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "detail_user_promos", "promo_id", "user_id")->using(DetailUserPromo::class);
    }

    public function detailUserPromo(): HasMany
    {
        return $this->hasMany(DetailUserPromo::class);
    }
}
