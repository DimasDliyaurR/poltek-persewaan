<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'a_nama',
        'a_foto',
        'a_keterangan',
        'a_tarif',
        'a_status',
        'a_satuan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function fotoAlatBarangs(): HasMany
    {
        return $this->hasMany(FotoAlatBarang::class);
    }

    public function transaksiAlatBarangs(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiAlatBarang::class);
    }
}
