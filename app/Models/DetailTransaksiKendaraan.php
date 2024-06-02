<?php

namespace App\Models;

use App\Models\Kendaraan;
use App\Models\TransaksiKendaraan;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiKendaraan extends Pivot
{
    use HasFactory;

    protected $table = "detail_transaksi_kendaraans";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_kendaraan_id',
        'kendaraan_id',
        'dtk_harga',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_kendaraan_id' => 'integer',
        'kendaraan_id' => 'integer',
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

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function transaksiKendaraan(): BelongsTo
    {
        return $this->belongsTo(TransaksiKendaraan::class);
    }
}
