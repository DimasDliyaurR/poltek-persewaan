<?php

namespace App\Models;

use App\Models\Layanan;
use App\Models\TransaksiLayanan;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiLayanan extends Pivot
{
    use HasFactory;
    protected $table = "detail_transaksi_layanans";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_layanan_id',
        'layanan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaksi_layanan_id' => 'integer',
        'layanan_id' => 'integer',
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

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function transaksiLayanan(): BelongsTo
    {
        return $this->belongsTo(TransaksiLayanan::class);
    }
}
