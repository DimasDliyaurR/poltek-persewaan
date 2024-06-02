<?php

namespace App\Models;

use App\Models\TimLayanan;
use App\Models\VideoLayanan;
use App\Models\TransaksiLayanan;
use App\Models\DetailFotoLayanan;
use Spatie\Activitylog\LogOptions;
use App\Models\DetailKategoriPromo;
use App\Models\RatingMerkKendaraan;
use App\Models\LayananPaymentMethod;
use App\Models\DetailTransaksiLayanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Layanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'l_foto',
        'l_nama',
        'l_tarif',
        'l_personil',
        'l_satuan',
        'l_status',
        'l_slug',
        'l_deskripsi',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'l_personil' => 'boolean',
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

    public function timLayanans(): HasMany
    {
        return $this->hasMany(TimLayanan::class);
    }

    public function detailFotoLayanans(): HasMany
    {
        return $this->hasMany(DetailFotoLayanan::class);
    }

    public function detailTransaksiLayanans(): HasMany
    {
        return $this->hasMany(DetailTransaksiLayanan::class);
    }

    public function videoLayanans(): HasMany
    {
        return $this->hasMany(VideoLayanan::class);
    }

    public function transaksiLayanans(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiLayanan::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(LayananPaymentMethod::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(RatingMerkKendaraan::class);
    }
}
