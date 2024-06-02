<?php

namespace App\Models;

use App\Models\AlatBarang;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SatuanAlatBarang extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function alatBarangs()
    {
        return $this->hasMany(AlatBarang::class);
    }
}
