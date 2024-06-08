<?php

namespace App\Repositories\GedungLap\JadwalGedung;

use App\Models\JadwalGedung;

class JadwalGedungRepositoryImplement implements JadwalGedungRepository
{
    private $jadwalGedung;

    public function __construct(JadwalGedung $jadwalGedung)
    {
        $this->jadwalGedung = $jadwalGedung;
    }

    /**
     * Get Data Jadwal Gedung Lapangan by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $gedungData = $this->jadwalGedung::whereId($id)->first();

        return $gedungData;
    }

    /**
     * Get All data Jadwal Gedung Lapangan
     * @return Array
     */
    public function getAll()
    {
        $gedungData = $this->jadwalGedung;

        return $gedungData;
    }

    /**
     * Store data to Jadwal Gedung Lapangan
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $gedungData = $this->jadwalGedung::create($data);

        return $gedungData;
    }

    /**
     * Update data dari data Jadwal Gedung Lapangan yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $gedungData = $this->jadwalGedung::findOrFail($id);
        $gedungData->update($data);

        return $gedungData;
    }

    /**
     * Delete data dari data Jadwal Gedung Lapangan
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $gedungData = $this->jadwalGedung::findOrFail($id);
        $gedungData->delete();

        return $gedungData;
    }
}
