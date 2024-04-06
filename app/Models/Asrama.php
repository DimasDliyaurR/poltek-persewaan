<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function tipeAsrama()
    {
        return $this->belongsTo(TipeAsrama::class);
    }

    public function detailFasilitasAsramas(): HasMany
    {
        return $this->hasMany(DetailFasilitasAsrama::class);
    }

    public function detailTransaksiAsramas(): HasMany
    {
        return $this->hasMany(DetailTransaksiAsrama::class);
    }

    public function asramas(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
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
