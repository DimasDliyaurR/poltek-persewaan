<?php

namespace App\Repositories\GedungLap\TransaksiGedung;

use App\Models\TransaksiGedung;
use App\Repositories\GedungLap\TransaksiGedung\TransaksiGedungRepository;

class TransaksiGedungRepositoryImplement implements TransaksiGedungRepository
{
    private $gedung;

    public function __construct(TransaksiGedung $gedung)
    {
        $this->gedung = $gedung;
    }

    /**
     * Get Data Gedung Lapangan by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $gedungData = $this->gedung::with("gedungLap", "user.profile")->whereId($id)->first();

        return $gedungData;
    }

    /**
     * Get All data Gedung Lapangan
     * @return Array
     */
    public function getAll()
    {
        $gedungData = $this->gedung::all();

        return $gedungData;
    }

    /**
     * Get All data Gedung Lapangan Detail Transaksi dan Detail Property
     * @return Array
     */
    public function getAllWithDetailTransaksiAndDetailProperty()
    {
        $gedungData = $this->gedung::with(["property", "gedungLap"])
            ->join("users", "transaksi_gedungs.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id");

        return $gedungData;
    }

    /**
     * Store data to Gedung Lapangan
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $gedungData = $this->gedung::create($data);

        return $gedungData;
    }

    /**
     * Update data dari data Gedung Lapangan yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $gedungData = $this->gedung::findOrFail();
        $gedungData->update($data);

        return $gedungData;
    }

    /**
     * Delete data dari data Gedung Lapangan
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $gedungData = $this->gedung::findOrFail($id);
        $gedungData->delete();

        return $gedungData;
    }

    /**
     * Search data kendaraan
     * @param string $search
     * @return object
     */
    public function search($search)
    {
        return $this->gedung::with(["gedungLap.paymentMethod"])
            ->join("users", "transaksi_gedungs.user_id", "=", "users.id")
            ->join("profiles", "users.id", "=", "profiles.user_id")
            ->orWhere(function ($q) use ($search) {
                $q->where('code_unique', "LIKE", "%$search%")
                    ->orWhere('profiles.nama_lengkap', "LIKE", "%$search%")
                    ->orWhere('tg_tanggal_sewa', "LIKE", "%$search%")
                    ->orWhere('tg_tanggal_kembali', "LIKE", "%$search%")
                    ->orWhere('tg_tanggal_pelaksanaan', "LIKE", "%$search%")
                    ->orWhere('status', "LIKE", "%$search%")
                    ->orWhere('tg_sub_total', "LIKE", "%$search%");
            });
    }
}
