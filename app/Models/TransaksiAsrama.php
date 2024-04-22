<?php

namespace App\Models;

use App\Models\User;
use App\Models\Asrama;
use App\Models\DetailTransaksiAsrama;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TransaksiAsrama extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'promo_id',
        'code_unique',
        'ta_tanggal_sewa',
        'ta_check_in',
        'ta_check_out',
        'ta_is_sarapan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'promo_id' => 'integer',
        'code_unique' => 'string',
        'ta_tanggal_sewa' => 'datetime',
        'ta_check_in' => 'datetime',
        'ta_check_out' => 'datetime',
    ];

    public function detailTransaksiAsramas(): HasMany
    {
        return $this->hasMany(DetailTransaksiAsrama::class);
    }

    public function fasilitasAsrama()
    {
        return $this->belongsToMany(fasilitasAsrama::class, "detail_transaksi_fasilitas", relatedPivotKey: "transaksi_asrama_id")
            ->using(DetailTransaksiFasilitas::class)->withPivot("dtf_harga");
    }

    public function asramas(): BelongsToMany
    {
        return $this->belongsToMany(Asrama::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }

    public function events(): MorphMany
    {
        return $this->morphMany(Event::class, 'eventable');
    }
}
