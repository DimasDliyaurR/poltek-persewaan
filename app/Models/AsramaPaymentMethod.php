<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsramaPaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = "tipe_asrama_id";
    protected $table = "asrama_payment_methods";

    protected $fillable = [
        "tipe_asrama_id",
        "is_dp",
        "tarif_dp",
    ];

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(TipeAsrama::class);
    }
}
