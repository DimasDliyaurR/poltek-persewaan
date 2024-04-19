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
        return $this->belongsToMany(Asrama::class);
    }

    public function alat_barangs(): BelongsToMany
    {
        return $this->belongsToMany(AlatBarang::class);
    }

    public function gedung_laps(): BelongsToMany
    {
        return $this->belongsToMany(GedungLap::class);
    }

    public function kendaraans(): BelongsToMany
    {
        return $this->belongsToMany(Kendaraan::class);
    }

    public function layanans(): BelongsToMany
    {
        return $this->belongsToMany(Layanan::class);
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
