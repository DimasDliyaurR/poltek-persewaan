<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanAlatBarang extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function alatBarangs()
    {
        return $this->hasMany(AlatBarang::class);
    }
}
