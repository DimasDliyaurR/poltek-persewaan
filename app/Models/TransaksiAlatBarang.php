<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiAlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
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
        'user_id' => 'integer',
        'a_tarif' => 'decimal:2',
    ];

    public function detailTransaksiAlatBarangs(): HasMany
    {
        return $this->hasMany(DetailTransaksiAlatBarang::class);
    }

    public function alatBarangs(): BelongsToMany
    {
        return $this->belongsToMany(AlatBarang::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}