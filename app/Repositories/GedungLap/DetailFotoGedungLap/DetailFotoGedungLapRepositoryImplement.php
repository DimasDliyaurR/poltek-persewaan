<?php

namespace  App\Repositories\GedungLap\DetailFotoGedungLap;

use App\Models\DetailFotoGedungLap;

class DetailFotoGedungLapRepositoryImplement implements DetailFotoGedungLapRepository
{
    private $detailFotoGedungLap;

    public function __construct(DetailFotoGedungLap $detailFotoGedungLap)
    {
        $this->detailFotoGedungLap = $detailFotoGedungLap::with("gedungLap");
    }

    /**
     * Get All Detail Foto Gedung Lap
     * @return object
     */
    public function getAll()
    {
        $this->detailFotoGedungLap;
    }

    /**
     * Get Data by id
     * @param int $id
     * @return object
     */
    public function getDataById($id)
    {
        return $this->detailFotoGedungLap->whereId($id);
    }

    /**
     * Get Data by Gedung Lap id
     * @param int $id
     * @return object
     */
    public function getDataByGedungLapId($id)
    {
        return $this->detailFotoGedungLap->whereGedungLapId($id);
    }

    /**
     * Create Gedung Lap Id
     * @param array $data
     * @return object
     */
    public function store(array $data)
    {
        return $this->detailFotoGedungLap->create($data);
    }

    /**
     * Update gedung lap
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update(array $data, $id)
    {
        return $this->detailFotoGedungLap->whereId($id)->update($data);
    }

    /**
     * Delete gedung lap
     * @param int $id
     * @return object
     */
    public function delete($id)
    {
        return $this->detailFotoGedungLap->whereId($id)->delete();
    }
}
