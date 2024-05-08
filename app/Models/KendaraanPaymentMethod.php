<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function merkKendaraan(): BelongsTo
    {
        return $this->belongsTo(MerkKendaraan::class);
    }
}
