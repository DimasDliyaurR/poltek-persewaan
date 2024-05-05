<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlatBarangPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "alat_barang_id",
        "is_dp",
        "dp_tarif",
    ];

    public function alatBarang(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }
}
