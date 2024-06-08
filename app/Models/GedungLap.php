<?php

namespace App\Models;

use App\Models\Promo;
use Spatie\Activitylog\LogOptions;
use App\Models\DetailFotoGedungLap;
use App\Models\DetailKategoriPromo;
use App\Models\RatingMerkKendaraan;
use App\Models\DetailTransaksiGedung;
use App\Models\GedungLapPaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GedungLap extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gl_foto',
        'code_unique',
        'gl_nama',
        'gl_keterangan',
        'gl_tarif',
        'gl_satuan_gedung',
        'gl_kapasitas_gedung',
        'gl_ukuran_gedung',
        'gl_jam_mulai',
        'gl_jam_akhir',
        'gl_slug',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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

    public function detailTransaksiGedungs(): HasMany
    {
        return $this->hasMany(DetailTransaksiGedung::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function detailFotoGedungLap(): HasMany
    {
        return $this->hasMany(DetailFotoGedungLap::class);
    }

    public function promos(): BelongsToMany
    {
        return  $this->belongsToMany(Promo::class);
    }

    public function jadwal(): BelongsToMany
    {
        return  $this->belongsToMany(JadwalGedung::class, "detail_jadwal_gedungs", "gedung_lap_id", "jadwal_id")->withPivot("id");
    }

    public function detailJadwalGedung()
    {
        return $this->hasMany(DetailJadwalGedung::class);
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(GedungLapPaymentMethod::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(RatingMerkKendaraan::class);
    }
}
