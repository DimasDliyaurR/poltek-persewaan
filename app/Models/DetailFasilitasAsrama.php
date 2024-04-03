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
        'asrama_id',
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
        'asrama_id' => 'integer',
        'fasilitas_asrama_id' => 'integer',
    ];

    public function fasilitasAsrama(): BelongsTo
    {
        return $this->belongsTo(FasilitasAsrama::class);
    }

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
    }
}
