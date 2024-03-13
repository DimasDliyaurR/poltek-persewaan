<?php

namespace App\Repositories\GedungLap\PropertyGedung;

use App\Models\PropertyGedung;
use App\Repositories\GedungLap\PropertyGedung\PropertyGedungRepository;

class PropertyGedungRepositoryImplement implements PropertyGedungRepository
{
    private $gedung;

    public function __construct(PropertyGedung $gedung)
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
