<?php

namespace App\Models;

use App\Models\Asrama;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiAsrama extends Pivot
{
    use HasFactory;

    protected $table = "detail_transaksi_asramas";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_asrama_id',
        'asrama_id',
        'dta_harga',
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
    }

    public function transaksiAsrama(): BelongsTo
    {
        return $this->belongsTo(Transaksiasrama::class);
    }
}
