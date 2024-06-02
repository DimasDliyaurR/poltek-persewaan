<?php

namespace App\Models;

use App\Models\FasilitasAsrama;
use App\Models\TransaksiAsrama;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiFasilitas extends Pivot
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "detail_transaksi_fasilitas";

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function transaksi_asrama(): BelongsTo
    {
        return $this->belongsTo(TransaksiAsrama::class);
    }

    public function fasilitas_asrama(): BelongsTo
    {
        return $this->belongsTo(FasilitasAsrama::class);
    }
}
