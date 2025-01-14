<?php

namespace App\Models;

use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use Spatie\Activitylog\LogOptions;
use App\Models\DetailKategoriPromo;
use App\Models\TransaksiAlatBarang;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promo extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ["id"];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function transaksiAsramas(): HasMany
    {
        return $this->hasMany(TransaksiAsrama::class);
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
        return $this->belongsToMany(User::class, "detail_user_promos", "promo_id")
            ->withPivot("user_id")
            ->using(DetailUserPromo::class);
    }

    public function detailUserPromo(): HasMany
    {
        return $this->hasMany(DetailUserPromo::class);
    }
}
