<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KendaraanPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "merk_kendaraan_id",
        "is_dp",
        "dp_tarif",
    ];

    public function merkKendaraan(): BelongsTo
    {
        return $this->belongsTo(MerkKendaraan::class);
    }
}
