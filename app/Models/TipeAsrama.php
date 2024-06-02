<?php

namespace App\Models;

use App\Models\Asrama;
use App\Models\FasilitasAsrama;
use App\Models\RatingTipeAsrama;
use Spatie\Activitylog\LogOptions;
use App\Models\AsramaPaymentMethod;
use App\Models\DetailFotoTipeAsrama;
use App\Models\DetailFasilitasAsrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TipeAsrama extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function detailFasilitasAsrama(): HasMany
    {
        return $this->hasMany(DetailFasilitasAsrama::class);
    }

    public function detailFotoTipeAsrama()
    {
        return $this->hasMany(DetailFotoTipeAsrama::class);
    }

    public function fasilitasAsramas(): BelongsToMany
    {
        return $this->belongsToMany(FasilitasAsrama::class, "detail_fasilitas_asramas", "tipe_asrama_id", "fasilitas_asrama_id")
            ->using(DetailFasilitasAsrama::class);
    }

    public function asramas(): HasMany
    {
        return $this->hasMany(Asrama::class);
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(AsramaPaymentMethod::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(RatingTipeAsrama::class);
    }
}
