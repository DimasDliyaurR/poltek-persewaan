<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiAsrama extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id',
        'ta_tanggal_sewa',
        'ta_check_in',
        'ta_check_out',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'User_id' => 'integer',
        'ta_tanggal_sewa' => 'datetime',
        'ta_check_in' => 'datetime',
        'ta_check_out' => 'datetime',
    ];

    public function hDetailTransaksiAsramas(): HasMany
    {
        return $this->hasMany(HDetailTransaksiAsrama::class);
    }

    public function hDetailTransaksiFasilitas(): HasMany
    {
        return $this->hasMany(HDetailTransaksiFasilitas::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
