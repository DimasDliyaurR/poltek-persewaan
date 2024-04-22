<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailTransaksiFasilitas extends Pivot
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "detail_transaksi_fasilitas";

    public function transaksi_asrama(): BelongsTo
    {
        return $this->belongsTo(TransaksiAsrama::class);
    }

    public function fasilitas_asrama(): BelongsTo
    {
        return $this->belongsTo(FasilitasAsrama::class);
    }
}
