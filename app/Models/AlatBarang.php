<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlatBarang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'a_nama',
        'satuan_alat_barang_id',
        'a_foto',
        'a_keterangan',
        'a_tarif',
        'a_qty',
        'a_status',
        'a_slug',
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
}
