<?php

namespace App\Repositories\Asrama\DetailFasilitasAsrama;

use App\Models\DetailFasilitasAsrama;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepository;

class DetailFasilitasAsramaRepositoryImplement implements DetailFasilitasAsramaRepository
{
    private $detailFasilitasAsrama;

    public function __construct(DetailFasilitasAsrama $detailFasilitasAsrama)
    {
        $this->detailFasilitasAsrama = $detailFasilitasAsrama;
    }

    /**
     * Get Data Detail Fasilitas Asrama By Id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {
        $detailFasilitasAsramaData = $this->detailFasilitasAsrama::whereId($id)->first();

        return $detailFasilitasAsramaData;
    }

    /**
     * Get Data Detail Fasilitas Asrama By Asrama Id
     * @param Id
     * @return Mixed
     */
    public function getAllDataByAsramaId($id)
    {
        $detailFasilitasAsramaData = $this->detailFasilitasAsrama::whereAsramaId($id)->with(["asrama", "fasilitasAsrama"])->latest()->get();

        return $detailFasilitasAsramaData;
    }

    /**
     * Get all data Detail fasilitas Asrama
     * @return Mixed
     */
    public function getAll()
    {
        return $this->detailFasilitasAsrama::all();
    }

    /**
     * Store Data Detail Fasilitas Asrama
     * @param data
     * @return Mixed
     */
    public function store($data)
    {
        $detailFasilitasAsramaData = $this->detailFasilitasAsrama::create($data);

        return $detailFasilitasAsramaData;
    }

    /**
     * 
     * @param Data , id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $detailFasilitasAsramaData = $this->detailFasilitasAsrama::whereId($id)->update($data);

        return $detailFasilitasAsramaData;
    }

    /**
     * Delete Data Detail Fasilitas Asrama
     * @param id
     * @return Mixed
     */
    public function delete($id)
    {
        $detailFasilitasAsramaData = $this->detailFasilitasAsrama::whereId($id)->delete();

        return $detailFasilitasAsramaData;
    }

    /**
     * Delete Data Detail Fasilitas Asrama
     * @param id
     * @param dataFasilitasId
     * @return boolean
     */
    public function IsExistFasilitasTransaksi($dataFasilitasId, $id)
    {
        $existDetail = DetailFasilitasAsrama::whereFasilitasAsramaId($dataFasilitasId)
            ->whereAsramaId($id)
            ->get();

        if (count($existDetail) > 0) return false;

        return true;
    }
}
