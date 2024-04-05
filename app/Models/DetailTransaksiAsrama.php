<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksiAsrama extends Model
{
    use HasFactory;

    protected $table = "asrama_transaksi_asrama";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_asrama_id',
        'asrama_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_asrama_id' => 'integer',
        'asrama_id' => 'integer',
    ];

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
    }

    public function transaksiAsrama(): BelongsTo
    {
        return $this->belongsTo(Transaksiasrama::class);
    }
}
