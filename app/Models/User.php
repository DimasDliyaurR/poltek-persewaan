<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Promo;
use App\Models\Profile;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TransaksiKendaraan;
use Spatie\Activitylog\LogOptions;
use App\Models\RatingMerkKendaraan;
use App\Models\TransaksiAlatBarang;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function promos()
    {
        $this->belongsToMany(Promo::class, "detail_user_promos", "user_id");
    }

    public function transaksiAlatBarang(): HasMany
    {
        return $this->hasMany(TransaksiAlatBarang::class, "user_id", "id");
    }

    public function transaksiLayanan(): HasMany
    {
        return $this->hasMany(TransaksiLayanan::class, "user_id", "id");
    }

    public function transaksiAsrama(): HasMany
    {
        return $this->hasMany(TransaksiAsrama::class, "user_id", "id");
    }

    public function transaksiKendaraan(): HasMany
    {
        return $this->hasMany(TransaksiKendaraan::class, "user_id", "id");
    }

    public function transaksiGedungLap(): HasMany
    {
        return $this->hasMany(TransaksiGedung::class, "user_id", "id");
    }

    public function rating_merk_kendaraan(): HasMany
    {
        return $this->hasMany(RatingMerkKendaraan::class, "user_id", "id");
    }
}
