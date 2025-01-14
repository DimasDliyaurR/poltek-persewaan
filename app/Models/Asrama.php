<?php

namespace App\Models;

use App\Models\Promo;
use App\Models\TipeAsrama;
use App\Models\FasilitasAsrama;
use App\Models\TransaksiAsrama;
use Spatie\Activitylog\LogOptions;
use App\Models\DetailKategoriPromo;
use App\Models\DetailFasilitasAsrama;
use App\Models\DetailTransaksiAsrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Asrama extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipe_asrama_id',
        'a_nama_ruangan',
        'a_foto',
        'a_slug',
        'a_status',
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
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }
    public function tipeAsrama()
    {
        return $this->belongsTo(TipeAsrama::class);
    }

    // public function detailFasilitasAsramas(): HasMany
    // {
    //     return $this->hasMany(DetailFasilitasAsrama::class);
    // }

    public function detailTransaksiAsramas(): HasMany
    {
        return $this->hasMany(DetailTransaksiAsrama::class);
    }

    public function fasilitasAsramas(): BelongsToMany
    {
        return $this->belongsToMany(FasilitasAsrama::class);
    }

    public function transaksiAsramas(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiAsrama::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function promos()
    {
        $this->belongsToMany(Promo::class);
    }
}
