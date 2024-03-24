<?php

namespace App\Repositories\Asrama\FasilitasAsrama;

use App\Models\FasilitasAsrama;
use Illuminate\Support\Facades\DB;
use App\Models\DetailFasilitasAsrama;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepository;

class FasilitasAsramaRepositoryImplement implements FasilitasAsramaRepository
{
    private $fasilitasAsrama;

    public function __construct(FasilitasAsrama $fasilitasAsrama)
    {
        $this->fasilitasAsrama = $fasilitasAsrama;
    }

    /**
     * Get Data Fasilitas Asrama by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama::findOrFail($id);

        return $FasilitasAsramaData;
    }

    /**
     * Get All data Fasilitas Asrama
     * @return Array
     */
    public function getAll()
    {
        $FasilitasAsramaData = $this->fasilitasAsrama::paginate(5);

        return $FasilitasAsramaData;
    }

    /**
     * Get All data Fasilitas Asrama Order By Name ASC
     * @return Array
     */
    public function getAllDataWithoutDataDetailFasilitas($id)
    {
        $order = DetailFasilitasAsrama::select(DB::raw(1))
            ->whereColumn("detail_fasilitas_asramas.fasilitas_asrama_id", "fasilitas_asramas.id");

        $fasilitasAsrama = $this->fasilitasAsrama::join("detail_fasilitas_asramas", "detail_fasilitas_asramas.fasilitas_asrama_id", "fasilitas_asramas.id")
            ->join("asramas", "asramas.id", "=", "detail_fasilitas_asramas.asrama_id")
            ->where("asrama_id", $id)
            ->whereNotExists($order)
            ->get();

        return $fasilitasAsrama;
    }

    /**
     * Store data to Fasilitas Asrama
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama::create($data);

        return $FasilitasAsramaData;
    }

    /**
     * Update data dari data Fasilitas Asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama::findOrFail($id);
        $FasilitasAsramaData->update($data);

        return $FasilitasAsramaData;
    }

    /**
     * Delete data dari data Fasilitas Asrama
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama::whereId($id);
        $FasilitasAsramaData->delete();

        return $FasilitasAsramaData;
    }
}
