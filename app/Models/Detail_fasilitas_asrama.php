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
        'Asrama_id',
        'Fasilitas_asrama_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Asrama_id' => 'integer',
        'Fasilitas_asrama_id' => 'integer',
    ];

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
    }

    public function fasilitasAsrama(): BelongsTo
    {
        return $this->belongsTo(FasilitasAsrama::class);
    }
}
