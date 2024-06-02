<?php

namespace App\Models;

use App\Models\TipeAsrama;
use App\Models\TransaksiAsrama;
use Spatie\Activitylog\LogOptions;
use App\Models\DetailFasilitasAsrama;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksiFasilitas;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'fa_tarif',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fa_tarif' => 'integer',
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

    public function detailFasilitasAsramas(): HasMany
    {
        return $this->hasMany(DetailFasilitasAsrama::class);
    }

    public function transaksiAsrama()
    {
        return $this->belongsToMany(TransaksiAsrama::class, "detail_transaksi_fasilitas", relatedPivotKey: "fasilitas_asrama_id")
            ->using(DetailTransaksiFasilitas::class)->withPivot("dtf_harga");
    }

    public function tipeAsramas(): BelongsToMany
    {
        return $this->belongsToMany(TipeAsrama::class, "detail_fasilitas_asramas", "tipe_asrama_id", "fasilitas_asrama_id")
            ->using(DetailFasilitasAsrama::class);
    }
}
