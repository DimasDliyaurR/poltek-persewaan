<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto_layanan',
        'l_nama',
        'l_tarif',
        'l_personil',
        'l_satuan',
        'l_status',
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

    public function videoLayanans(): HasMany
    {
        return $this->hasMany(VideoLayanan::class);
    }

    public function timLayanans(): HasMany
    {
        return $this->hasMany(TimLayanan::class);
    }
}
