<?php

namespace App\Repositories\GedungLap\DetailFotoGedungLap;

interface DetailFotoGedungLapRepository
{
    /**
     * Get All Detail Foto Gedung Lap
     * @return object
     */
    public function getAll();

    /**
     * Get Data by id
     * @param int $id
     * @return object
     */
    public function getDataById($id);

    /**
     * Get Data by Gedung Lap id
     * @param int $id
     * @return object
     */
    public function getDataByGedungLapId($id);

    /**
     * Create Gedung Lap Id
     * @param array $data
     * @return object
     */
    public function store(array $data);

    /**
     * Update gedung lap
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update(array $data, $id);

    /**
     * Delete gedung lap
     * @param int $id
     * @return object
     */
    public function delete($id);
}
