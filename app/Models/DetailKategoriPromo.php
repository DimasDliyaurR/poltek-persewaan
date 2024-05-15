<?php

namespace App\Models;

use App\Models\Asrama;
use App\Models\Layanan;
use App\Models\GedungLap;
use App\Models\Kendaraan;
use App\Models\AlatBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailKategoriPromo extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function asramas(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
    }

    public function alat_barangs(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }

    public function gedung_laps(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }

    public function kendaraans(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function layanans(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function promos(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }
}
