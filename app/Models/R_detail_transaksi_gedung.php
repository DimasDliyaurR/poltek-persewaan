<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RDetailTransaksiGedung extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_transaksi_id',
        'Property_gedung_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'detail_transaksi_id' => 'integer',
        'Property_gedung_id' => 'integer',
    ];

    public function detailTransaksi(): BelongsTo
    {
        return $this->belongsTo(HDetailTransaksiGedung::class);
    }

    public function propertyGedung(): BelongsTo
    {
        return $this->belongsTo(PropertyGedung::class);
    }
}
