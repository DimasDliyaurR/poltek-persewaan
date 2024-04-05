<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FasilitasAsrama extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fa_icon',
        'fa_nama',
        'fa_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function detailFasilitasAsramas(): HasMany
    {
        return $this->hasMany(DetailFasilitasAsrama::class);
    }

    public function tipeAsramas(): BelongsToMany
    {
        return $this->belongsToMany(TipeAsrama::class, "detail_fasilitas_asramas", "tipe_asrama_id", "fasilitas_asrama_id")
            ->using(DetailFasilitasAsrama::class);
    }
}
