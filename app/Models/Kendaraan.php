<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kendaraan extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merk_kendaraan_id',
        'k_plat',
        'k_nama',
        'k_status',
        'k_slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'merk_kendaraan_id' => 'integer',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function detailTransaksiKendaraans(): HasMany
    {
        return $this->hasMany(DetailTransaksiKendaraan::class);
    }

    public function merkKendaraan(): BelongsTo
    {
        return $this->belongsTo(MerkKendaraan::class, "merk_kendaraan_id");
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function transaksiKendaraans(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiKendaraan::class);
    }

    public function promos()
    {
        $this->belongsToMany(Promo::class);
    }
}
