<?php

namespace App\Repositories\GedungLap;

use App\Models\GedungLap;
use App\Repositories\GedungLap\GedungLapRepository;

class GedungLapRepositoryImplement implements GedungLapRepository
{
    private $gedung;

    public function __construct(GedungLap $gedung)
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
        $gedungData = $this->gedung::with(["jadwal"])->whereId($id)->first();

        return $gedungData;
    }

    /**
     * Get All data Gedung Lapangan
     * @return Array
     */
    public function getAll()
    {
        $gedungData = $this->gedung::with(["detailFotoGedungLap", "jadwal"]);

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
        $gedungData = $this->gedung::findOrFail($id);
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
