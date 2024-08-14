<?php

namespace App\Repositories\Asrama\TransaksiAsrama;

use App\Models\TransaksiAsrama;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepository;

class TransaksiAsramaRepositoryImplement implements TransaksiAsramaRepository
{
    private $transaksiAsrama;

    public function __construct(TransaksiAsrama $transaksiAsrama)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $this->transaksiAsrama = $transaksiAsrama;
    }

    /**
     * Get Data Transaksi Asrama by Id 
     * @param $id
     * @return Array
     */
    public function getDataById($id)
    {
        $transaksiAsramaData = $this->transaksiAsrama::with(["asramas.tipeAsrama", "user.profile"])->whereId($id);

        return $transaksiAsramaData;
    }

    /**
     * Get All data Transaksi Asrama
     * @return Array
     */
    public function getAll()
    {
        $transaksiAsramaData = $this->transaksiAsrama::all();

        return $transaksiAsramaData;
    }

    /**
     * Get All data Transaksi Asrama With Detail Transaksi Asrama
     * @return Array
     */
    public function getAllWithDetailTransaksiAsrama()
    {
        $transaksiAsramaData = $this->transaksiAsrama::with(["asramas" => ["tipeAsrama"], "fasilitasAsrama", "user.profile"]);

        return $transaksiAsramaData;
    }

    /**
     * Get All data Transaksi Asrama With Asrama and User
     * @return Object
     */
    public function getAllWithUserAndAsrama()
    {
        $transaksiAsramaData = $this->transaksiAsrama::with(["asramas.tipeAsrama", "user.profile"]);

        return $transaksiAsramaData;
    }

    /**
     * Store data to Transaksi Asrama
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $transaksiAsramaData = $this->transaksiAsrama::create($data);

        return $transaksiAsramaData;
    }

    /**
     * Update data dari data Transaksi Asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $transaksiAsramaData = $this->transaksiAsrama::findOrFail();
        $transaksiAsramaData->update($data);

        return $transaksiAsramaData;
    }

    /**
     * Delete data dari data Transaksi Asrama
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $transaksiAsramaData = $this->transaksiAsrama::findOrFail($id);
        $transaksiAsramaData->delete();

        return $transaksiAsramaData;
    }

    /**
     * Search data Asrama
     * @param string $search
     * @return object
     */
    public function search($search)
    {
        return $this->transaksiAsrama::with(["asramas"])
            ->join("users", "transaksi_asramas.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id")
            ->orWhere(function ($q) use ($search) {
                $q->where('code_unique', "LIKE", "%$search%")
                    ->orWhere('profiles.nama_lengkap', "LIKE", "%$search%")
                    ->orWhere('ta_tanggal_sewa', "LIKE", "%$search%")
                    ->orWhere('ta_check_in', "LIKE", "%$search%")
                    ->orWhere('ta_check_out', "LIKE", "%$search%")
                    ->orWhere('status', "LIKE", "%$search%")
                    ->orWhere('ta_sub_total', "LIKE", "%$search%");
            });
    }
}
