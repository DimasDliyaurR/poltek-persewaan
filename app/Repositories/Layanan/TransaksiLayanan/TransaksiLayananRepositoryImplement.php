<?php

namespace App\Repositories\Layanan\TransaksiLayanan;

use App\Models\TransaksiLayanan;
use App\Repositories\Layanan\TransaksiLayanan\TransaksiLayananRepository;

class TransaksiLayananRepositoryImplement implements TransaksiLayananRepository
{
    private $layanan;

    public function __construct(TransaksiLayanan $layanan)
    {
        $this->layanan = $layanan;
    }

    /**
     *  Get Data By id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->layanan::with("layanans", "user.profile")->whereId($id);
    }

    /**
     * Get All Data layanan
     * @param
     * @return Mixed
     */
    public function getAll()
    {
        return $this->layanan::all();
    }

    /**
     * Get All Data Transaksi layanan
     * @param
     * @return Mixed
     */
    public function getAllWithDetailTransaksi()
    {
        return $this->layanan::with("detailTransaksiLayanans")
            ->join("users", "transaksi_layanans.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id");
    }

    /**
     * Store data layanan
     * @param Data
     * @return Mixed
     */
    public function store($data)
    {
        $dataLayanan = $this->layanan::create($data);
        return $dataLayanan;
    }

    /**
     * 
     * @param data ,id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $dataLayanan = $this->layanan::findOrFail($id);
        $dataLayanan->update($data);
        return $dataLayanan;
    }

    /**
     * Delete data layanan
     * @param id
     * @return Mixed
     */
    public function delete($id)
    {
        $dataLayanan = $this->layanan::findOrFail($id);
        $dataLayanan->delete();

        return $dataLayanan;
    }

    /**
     * Search data Transaksi Layanan
     * @param string $search
     * @return object
     */
    public function search($search)
    {
        return $this->layanan::with(["layanans.paymentMethod"])
            ->join("users", "transaksi_layanans.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id")
            ->orWhere(function ($q) use ($search) {
                $q->where('code_unique', "LIKE", "%$search%")
                    ->orWhere('profiles.nama_lengkap', "LIKE", "%$search%")
                    ->orWhere('tl_tanggal_sewa', "LIKE", "%$search%")
                    ->orWhere('tl_tanggal_pelaksanaan', "LIKE", "%$search%")
                    ->orWhere('tl_tanggal_kembali', "LIKE", "%$search%")
                    ->orWhere('tl_sub_total', "LIKE", "%$search%")
                    ->orWhere('status', "LIKE", "%$search%");
            });
    }
}
