<?php

namespace App\Repositories\Kendaraan\TransaksiKendaraan;

use App\Models\TransaksiKendaraan;
use App\Repositories\Kendaraan\TransaksiKendaraan\TransaksiKendaraanRepository;

class TransaksiKendaraanRepositoryImplement implements TransaksiKendaraanRepository
{
    private $transaksiKendaraan;

    public function __construct(TransaksiKendaraan $transaksiKendaraan)
    {
        $this->transaksiKendaraan = $transaksiKendaraan;
    }

    /**
     * 
     * @param integer $id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->transaksiKendaraan::with(["kendaraans.merkKendaraan", "users.profile"])->whereId($id);
    }

    /**
     * Get All Data Kendaraan
     * @return Mixed
     */
    public function getAll()
    {
        return $this->transaksiKendaraan;
    }

    /**
     * Get All Data Transaksi Kendaraan With Detail Transaksi Kendaraan
     * @return Mixed
     */
    public function getAllWithDetailTransaksiKendaraan()
    {
        return $this->transaksiKendaraan::select("transaksi_kendaraans.*", "profiles.nama_lengkap")->with(["kendaraans.merkKendaraan.paymentMethod"])
            ->join("users", "transaksi_kendaraans.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id");
    }

    /**
     * Store data kendaraan
     * @param array $data
     * @return Mixed
     */
    public function store($data)
    {
        $dataKendaraan = $this->transaksiKendaraan::create($data);
        return $dataKendaraan;
    }

    /**
     * 
     * @param integer $id
     * @param array $data
     * @return Mixed
     */
    public function update($data, $id)
    {
        $dataKendaraan = $this->transaksiKendaraan::finOrFail($id);
        $dataKendaraan->update($data);
        return $dataKendaraan;
    }

    /**
     * Delete data kendaraan
     * @param integer $id
     * @return Mixed
     */
    public function delete($id)
    {
        $dataKendaraan = $this->transaksiKendaraan::findOrFail($id);
        $dataKendaraan->delete();

        return $dataKendaraan;
    }

    /**
     * Search data kendaraan
     * @param string $search
     * @return object
     */
    public function search($search)
    {
        return $this->transaksiKendaraan::with(["kendaraans.merkKendaraan.paymentMethod"])
            ->join("users", "transaksi_kendaraans.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id")
            ->orWhere(function ($q) use ($search) {
                $q->where('code_unique', "LIKE", "%$search%")
                    ->orWhere('profiles.nama_lengkap', "LIKE", "%$search%")
                    ->orWhere('tk_tanggal_sewa', "LIKE", "%$search%")
                    ->orWhere('tk_durasi', "LIKE", "%$search%")
                    ->orWhere('tk_pelaksanaan', "LIKE", "%$search%")
                    ->orWhere('status', "LIKE", "%$search%")
                    ->orWhere('tk_tanggal_kembali', "LIKE", "%$search%");
            });
    }
}
