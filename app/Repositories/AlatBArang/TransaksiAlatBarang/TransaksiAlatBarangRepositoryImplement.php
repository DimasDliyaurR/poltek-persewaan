<?php

namespace App\Repositories\AlatBarang\TransaksiAlatBarang;

use App\Models\TransaksiAlatBarang;
use App\Repositories\AlatBarang\TransaksiAlatBarang\TransaksiAlatBarangRepository;

class TransaksiAlatBarangRepositoryImplement implements TransaksiAlatBarangRepository
{
    private $alatBarang;

    public function __construct(TransaksiAlatBarang $alatBarang)
    {
        $this->alatBarang = $alatBarang;
    }

    /**
     * Get Data Alat Barang by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $alatBarangData = $this->alatBarang::with(["alatBarangs", "user.profile"])->whereId($id);

        return $alatBarangData;
    }

    /**
     * Get All data Alat Barang
     * @return Array
     */
    public function getAll()
    {
        $alatBarangData = $this->alatBarang::all();

        return $alatBarangData;
    }

    /**
     * Get All data Alat Barang WIth Detail Transaksi Alat Barang
     * @return Array
     */
    public function getAllWithDetailTransaksiAlatBarang()
    {
        $alatBarangData = $this->alatBarang::with("alatBarangs.satuanAlatBarangs")
            ->join("users", "transaksi_alat_barangs.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id");

        return $alatBarangData;
    }

    /**
     * Store data to Alat Barang
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $alatBarangData = $this->alatBarang::create($data);

        return $alatBarangData;
    }

    /**
     * Update data dari data Alat Barang yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $alatBarangData = $this->alatBarang::findOrFail();
        $alatBarangData->update($data);

        return $alatBarangData;
    }

    /**
     * Delete data dari data Alat Barang
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $alatBarangData = $this->alatBarang::findOrFail($id);
        $alatBarangData->delete();

        return $alatBarangData;
    }

    /**
     * Search data kendaraan
     * @param string $search
     * @return object
     */
    public function search($search)
    {
        return $this->alatBarang::with(["alat_barangs.paymentMethod"])
            ->join("users", "transaksi_alat_barangs.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id")
            ->orWhere(function ($q) use ($search) {
                $q->where('code_unique', "LIKE", "%$search%")
                    ->orWhere('profiles.nama_lengkap', "LIKE", "%$search%")
                    ->orWhere('created_at', "LIKE", "%$search%")
                    ->orWhere('tab_tanggal_pesanan', "LIKE", "%$search%")
                    ->orWhere('tab_tanggal_kembali', "LIKE", "%$search%")
                    ->orWhere('status', "LIKE", "%$search%")
                    ->orWhere('tab_sub_total', "LIKE", "%$search%");
            });
    }
}
