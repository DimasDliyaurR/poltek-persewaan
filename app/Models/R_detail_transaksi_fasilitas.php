<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RDetailTransaksiFasilitas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_fasilitas_id',
        'Fasilitas_asrama_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'detail_fasilitas_id' => 'integer',
        'Fasilitas_asrama_id' => 'integer',
    ];

    public function detailFasilitas(): BelongsTo
    {
        return $this->belongsTo(HDetailTransaksiAsrama::class);
    }

    public function fasilitasAsrama(): BelongsTo
    {
        return $this->belongsTo(FasilitasAsrama::class);
    }
}
