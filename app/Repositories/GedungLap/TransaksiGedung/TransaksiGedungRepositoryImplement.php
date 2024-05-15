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
        $gedungData = $this->gedung::whereId($id)->first();

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
        $gedungData = $this->gedung::with(["property", "gedungLap"]);

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
}
