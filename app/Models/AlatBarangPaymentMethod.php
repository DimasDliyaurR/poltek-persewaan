<?php

namespace App\Models;

use App\Models\AlatBarang;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlatBarangPaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = "alat_barang_id";

    protected $fillable = [
        "alat_barang_id",
        "is_dp",
        "tarif_dp",
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

    public function alatBarang(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }
}
