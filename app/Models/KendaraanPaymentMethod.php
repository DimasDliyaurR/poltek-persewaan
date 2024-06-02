<?php

namespace App\Models;

use App\Models\MerkKendaraan;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KendaraanPaymentMethod extends Model
{
    use HasFactory;

    protected $table = "merk_kendaraan_payment_methods";
    protected $primaryKey = "merk_kendaraan_id";

    protected $fillable = [
        "merk_kendaraan_id",
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

    public function merkKendaraan(): BelongsTo
    {
        return $this->belongsTo(MerkKendaraan::class);
    }
}
