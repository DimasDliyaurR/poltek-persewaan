<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailFasilitasAsrama extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipe_asrama_id',
        'fasilitas_asrama_id',
    ];

    protected $table = "detail_fasilitas_asramas";

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipe_asrama_id' => 'integer',
        'fasilitas_asrama_id' => 'integer',
    ];

    public function fasilitasAsrama(): BelongsTo
    {
        return $this->belongsTo(FasilitasAsrama::class);
    }

    public function tipeAsrama(): BelongsTo
    {
        return $this->belongsTo(TipeAsrama::class);
    }
}
