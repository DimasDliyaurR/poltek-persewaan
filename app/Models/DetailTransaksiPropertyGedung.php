<?php

namespace App\Models;

use App\Models\PropertyGedung;
use App\Models\TransaksiGedung;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiPropertyGedung extends Model
{
    use HasFactory;

    protected $table = "detail_transaksi_property_gedungs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_gedung_id',
        'property_gedung_id',
        'qty',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaksi_gedung_id' => 'integer',
        'property_gedung_id' => 'integer',
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

    public function transaksiGedung(): BelongsTo
    {
        return $this->belongsTo(TransaksiGedung::class);
    }

    public function propertyGedung(): BelongsTo
    {
        return $this->belongsTo(PropertyGedung::class);
    }
}
