<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksiKendaraan;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TransaksiKendaraan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'code_unique',
        'tk_durasi',
        'tk_tanggal_sewa',
        'tk_tanggal_kembali',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tk_tanggal_sewa' => 'timestamp',
        'tk_tanggal_kembali' => 'datetime',
    ];
    public function createEvent()
    {
        $event = new Event([
            'tgl_mulai' => $this->tk_tanggal_sewa,
            'tgl_kembali' => $this->tk_tanggal_kembali,
        ]);
        $this->events()->save($event);
    }

    public function detailTransaksiKendaraans(): HasMany
    {
        return $this->hasMany(DetailTransaksiKendaraan::class);
    }

    public function kendaraans(): BelongsToMany
    {
        return $this->belongsToMany(Kendaraan::class, "detail_transaksi_kendaraans", "transaksi_kendaraan_id", "kendaraan_id")
            ->using(DetailTransaksiKendaraan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function events(): MorphMany
    {
        return $this->morphMany(Event::class, 'eventable');
    }
}
