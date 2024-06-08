<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PromosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('promos')->delete();
        
        \DB::table('promos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'p_judul' => 'Promo Akhir Bulan',
                'p_foto' => 'promo/d0rj420uWTZsu759mDYRzkzR5N6E3l3nwlXqRyLL.png',
                'p_kode' => 'SAYASIAPA',
                'p_isi' => 50000,
                'p_tipe' => 'fixed',
                'p_is_umum' => 1,
                'p_is_aktif' => 1,
                'p_deskripsi' => 'Promo ini berlaku hanya sampai akhir tahun',
                'p_mulai' => '2024-06-07 00:00:00',
                'p_kadaluarsa' => '2024-06-09 00:00:00',
                'p_jumlah' => 0,
                'p_tipe_stok' => 'unlimited',
                'p_kategori' => 'kendaraans',
                'created_at' => '2024-06-07 21:15:24',
                'updated_at' => '2024-06-07 21:15:24',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'p_judul' => 'Promo Akhir Tahun Avenged Sevenfold',
                'p_foto' => 'promo/uV6dSnTj08rZAT98TLAV7N6KmpKYPFFPyfMf3izN.png',
                'p_kode' => '456q588',
                'p_isi' => 30,
                'p_tipe' => 'percent',
                'p_is_umum' => 1,
                'p_is_aktif' => 1,
                'p_deskripsi' => 'Promo ini berlaku hanya sampai akhir tahun',
                'p_mulai' => '2024-06-07 00:00:00',
                'p_kadaluarsa' => '2024-06-09 00:00:00',
                'p_jumlah' => 0,
                'p_tipe_stok' => 'unlimited',
                'p_kategori' => 'kendaraans',
                'created_at' => '2024-06-07 21:16:21',
                'updated_at' => '2024-06-07 21:16:21',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'p_judul' => 'Promo Asrama 1',
                'p_foto' => 'promo/GYqNwBWGEvUmmNV9mgaKOd1fnwsEPZdsMXoGdIuz.png',
                'p_kode' => 'ASRAMA1',
                'p_isi' => 50000,
                'p_tipe' => 'fixed',
                'p_is_umum' => 0,
                'p_is_aktif' => 1,
                'p_deskripsi' => 'Promo ini berlaku hanya sampai akhir tahun',
                'p_mulai' => '2024-06-08 00:00:00',
                'p_kadaluarsa' => '2024-06-10 00:00:00',
                'p_jumlah' => 0,
                'p_tipe_stok' => 'unlimited',
                'p_kategori' => 'asramas',
                'created_at' => '2024-06-08 08:26:37',
                'updated_at' => '2024-06-08 08:26:37',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'p_judul' => 'Asrama 2',
                'p_foto' => 'promo/SAETeRZOROkoCo9zsF9lomtiN82jmQ16ZzWcAcpC.png',
                'p_kode' => 'ASRAMA2',
                'p_isi' => 30,
                'p_tipe' => 'percent',
                'p_is_umum' => 1,
                'p_is_aktif' => 1,
                'p_deskripsi' => 'Promo ini berlaku hanya sampai akhir tahun',
                'p_mulai' => '2024-06-08 00:00:00',
                'p_kadaluarsa' => '2024-06-12 00:00:00',
                'p_jumlah' => 0,
                'p_tipe_stok' => 'unlimited',
                'p_kategori' => 'asramas',
                'created_at' => '2024-06-08 08:27:41',
                'updated_at' => '2024-06-08 08:27:41',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'p_judul' => 'Alat Barang 1',
                'p_foto' => 'promo/AnOW73WTtxGhHfK2HKbMlbVorUzZCUuRNDoFtGzi.png',
                'p_kode' => 'ALATBARANG1',
                'p_isi' => 20000,
                'p_tipe' => 'fixed',
                'p_is_umum' => 1,
                'p_is_aktif' => 1,
                'p_deskripsi' => 'Promo ini berlaku hanya sampai akhir tahun',
                'p_mulai' => '2024-06-08 00:00:00',
                'p_kadaluarsa' => '2024-06-11 00:00:00',
                'p_jumlah' => 0,
                'p_tipe_stok' => 'unlimited',
                'p_kategori' => 'alat_barangs',
                'created_at' => '2024-06-08 09:59:02',
                'updated_at' => '2024-06-08 09:59:02',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'p_judul' => 'Alat Barang 2',
                'p_foto' => 'promo/HM7t2St0kR52FYI3gIlKCMgTzs9JVAy5STAWXnbp.png',
                'p_kode' => 'ALATBARANG2',
                'p_isi' => 30,
                'p_tipe' => 'percent',
                'p_is_umum' => 1,
                'p_is_aktif' => 1,
                'p_deskripsi' => 'Promo ini berlaku hanya sampai akhir tahun',
                'p_mulai' => '2024-06-08 00:00:00',
                'p_kadaluarsa' => '2024-06-11 00:00:00',
                'p_jumlah' => 0,
                'p_tipe_stok' => 'unlimited',
                'p_kategori' => 'alat_barangs',
                'created_at' => '2024-06-08 10:00:18',
                'updated_at' => '2024-06-08 10:00:18',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}