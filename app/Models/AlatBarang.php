<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ab_nama',
        'satuan_alat_barang_id',
        'ab_foto',
        'ab_keterangan',
        'ab_tarif',
        'ab_qty',
        'ab_status',
        'ab_slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function fotoAlatBarangs(): HasMany
    {
        return $this->hasMany(FotoAlatBarang::class);
    }

    public function detailTransaksiAlatBarangs(): HasMany
    {
        return $this->hasMany(DetailTransaksiAlatBarang::class);
    }

    public function transaksiAlatBarangs(): BelongsToMany
    {
        return $this->belongsToMany(TransaksiAlatBarang::class);
    }

    public function detailKategoriPromo(): HasMany
    {
        return $this->hasMany(DetailKategoriPromo::class);
    }

    public function satuanAlatBarangs(): BelongsTo
    {
        return $this->belongsTo(SatuanAlatBarang::class, "satuan_alat_barang_id");
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(AlatBarangPaymentMethod::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(RatingMerkKendaraan::class);
    }
}
