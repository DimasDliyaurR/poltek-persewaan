<?php

namespace App\Models;

use App\Models\TransaksiGedung;
use App\Models\TransaksiKendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    protected static function booted()
    {
        static::creating(function ($event) {
            // Dapatkan instance dari model transaksi terkait
            $transaksi = $event->eventable;
            
            // Periksa tipe model transaksi dan isi kolom tgl_mulai dan tgl_kembali sesuai
            if ($transaksi instanceof TransaksiKendaraan) {
                $event->tgl_mulai = $transaksi->tk_tanggal_sewa;
                $event->tgl_kembali = $transaksi->tk_tanggal_kembali;
            } elseif ($transaksi instanceof TransaksiGedung) {
                $event->tgl_mulai = $transaksi->tg_tanggal_sewa;
                $event->tgl_kembali = $transaksi->tg_tanggal_kembali;
            }
            // Tambahkan logika untuk model transaksi lainnya jika diperlukan
        });
    }
    public function eventable(): MorphTo
    {
        return $this->morphTo();
    }
}
