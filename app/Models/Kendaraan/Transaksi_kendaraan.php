<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiKendaraan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'foto_sim',
        'tk_durasi',
        'tk_tanggal_sewa',
        'tk_tanggal_kembali',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tk_tanggal_sewa' => 'timestamp',
        'tk_tanggal_kembali' => 'datetime',
    ];

    public function hDetailTransaksiKendaraans(): HasMany
    {
        return $this->hasMany(HDetailTransaksiKendaraan::class);
    }

    public function merkKendaraans(): BelongsToMany
    {
        return $this->belongsToMany(MerkKendaraan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
