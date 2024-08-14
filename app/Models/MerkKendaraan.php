<?php

namespace App\Models;

use App\Models\Kendaraan;
use App\Models\TransaksiKendaraan;
use Spatie\Activitylog\LogOptions;
use App\Models\RatingMerkKendaraan;
use App\Models\KendaraanPaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MerkKendaraan extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mk_foto',
        'mk_merk',
        'mk_seri',
        'mk_tarif',
        'mk_kapasitas',
        'mk_deskripsi',
        'mk_bahan_bakar',
        'mk_slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function kendaraans(): HasMany
    {
        return $this->hasMany(Kendaraan::class, "merk_kendaraan_id", "id");
    }

    public function transaksiKendaraans(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiKendaraan::class);
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(KendaraanPaymentMethod::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(RatingMerkKendaraan::class);
    }
}
