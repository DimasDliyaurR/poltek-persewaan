<?php

namespace App\Models;

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

    public function detailTransaksiKendaraans(): HasMany
    {
        return $this->hasMany(DetailTransaksiKendaraan::class);
    }

    public function kendaraans(): BelongsToMany
    {
        return $this->belongsToMany(Kendaraan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
