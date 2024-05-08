<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlatBarangPaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = "alat_barang_id";

    protected $fillable = [
        "alat_barang_id",
        "is_dp",
        "tarif_dp",
    ];

    public function alatBarang(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }
}
