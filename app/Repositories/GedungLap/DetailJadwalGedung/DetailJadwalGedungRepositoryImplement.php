<?php

namespace App\Repositories\GedungLap\DetailJadwalGedung;

use App\Models\DetailJadwalGedung;

class DetailJadwalGedungRepositoryImplement implements DetailJadwalGedungRepository
{
    private $detailJadwalGedung;

    public function __construct(DetailJadwalGedung $detailJadwalGedung)
    {
        $this->detailJadwalGedung = $detailJadwalGedung;
    }

    /**
     * Get Data Detail Jadwal Gedung Lapangan by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $gedungData = $this->detailJadwalGedung::whereId($id)->first();

        return $gedungData;
    }

    /**
     * Get All data Detail Jadwal Gedung Lapangan
     * @return Array
     */
    public function getAll()
    {
        $gedungData = $this->detailJadwalGedung;

        return $gedungData;
    }

    /**
     * Store data to Detail Jadwal Gedung Lapangan
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $gedungData = $this->detailJadwalGedung::create($data);

        return $gedungData;
    }

    /**
     * Update data dari data Detail Jadwal Gedung Lapangan yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $gedungData = $this->detailJadwalGedung::findOrFail($id);
        $gedungData->update($data);

        return $gedungData;
    }

    /**
     * Delete data dari data Detail Jadwal Gedung Lapangan
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $gedungData = $this->detailJadwalGedung::whereId($id);
        $gedungData->delete();

        return $gedungData;
    }
}
