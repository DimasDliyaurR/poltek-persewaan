<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimLayanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'layanan_id',
        'tl_nama',
        'tl_status',
        'tl_deskripsi',
        'tl_slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'layanan_id' => 'integer',
    ];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}
