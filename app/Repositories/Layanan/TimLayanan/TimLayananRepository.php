<?php

namespace App\Repositories\Layanan\TimLayanan;

interface TimLayananRepository
{
    /**
     * Get Data Tim Layanan
     * @param id
     * @return Mixed
     */
    public function getDataById($id);

    /**
     * Get Data Tim Layanan By Asrama Id
     * @param id
     * @return Mixed
     */
    public function getDataByLayananId($id);

    /**
     * Get All Data Tim Layanan
     * @return Mixed
     */
    public function getAll();

    /**
     * Store Tim Layanan
     * @param data
     * @return Mixed
     */
    public function store($data);

    /**
     * Update data Tim Layanan
     * @param data , id
     * @return Mixed
     */
    public function update($data, $id);

    /**
     * Delete date Tim Layanan
     * @param id
     * @return Mixed
     */
    public function delete($id);
}
