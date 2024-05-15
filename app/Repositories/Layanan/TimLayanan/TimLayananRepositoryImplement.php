<?php

namespace App\Repositories\Layanan\TimLayanan;

use App\Models\TimLayanan;

class TimLayananRepositoryImplement implements TimLayananRepository
{
    private $timLayanan;

    public function __construct(TimLayanan  $timLayanan)
    {
        $this->timLayanan = $timLayanan;
    }

    /**
     * Get Data Tim Layanan
     * @param id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->timLayanan::whereId($id)->first();
    }

    /**
     * Get Data Tim Layanan
     * @param id
     * @return Mixed
     */
    public function getDataByLayananId($id)
    {
        return $this->timLayanan::whereLayananId($id)->get();
    }

    /**
     * Get All Data Tim Layanan
     * @return Mixed
     */
    public function getAll()
    {
        return $this->timLayanan::all();
    }

    /**
     * Store Tim Layanan
     * @param data
     * @return Mixed
     */
    public function store($data)
    {
        $timLayananData = $this->timLayanan::create($data);

        return $timLayananData;
    }

    /**
     * Update data Tim Layanan
     * @param data , id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $timLayananData = $this->timLayanan::findOrFail($id)->update($data);
        return $timLayananData;
    }

    /**
     * Delete date Tim Layanan
     * @param id
     * @return Mixed
     */
    public function delete($id)
    {
        $timLayananData = $this->timLayanan::findOrFail($id)->delete();

        return $timLayananData;
    }
}
