<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TipeAsrama extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function asramas(): HasMany
    {
        return $this->hasMany(Asrama::class);
    }

    public function detailFasilitasAsrama(): HasMany
    {
        return $this->hasMany(DetailFasilitasAsrama::class);
    }

    public function fasilitasAsramas(): BelongsToMany
    {
        return $this->belongsToMany(FasilitasAsrama::class, "detail_fasilitas_asramas", "fasilitas_asrama_id", "tipe_asrama_id")
            ->using(DetailFasilitasAsrama::class);
    }
}
