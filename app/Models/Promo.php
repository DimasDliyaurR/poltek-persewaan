<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promo extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function asramas(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiAsrama::class);
    }

    public function alat_barangs(): HasMany
    {
        return $this->hasMany(TransaksiAlatBarang::class);
    }

    public function gedung_laps(): HasMany
    {
        return $this->hasMany(TransaksiGedung::class);
    }

    public function kendaraans(): HasMany
    {
        return $this->hasMany(TransaksiKendaraan::class);
    }

    public function layanans(): HasMany
    {
        return $this->hasMany(TransaksiLayanan::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "detail_user_promos", "promo_is", "user_id")->using(DetailUserPromo::class);
    }

    public function detailUserPromo(): HasMany
    {
        return $this->hasMany(DetailUserPromo::class);
    }
}
