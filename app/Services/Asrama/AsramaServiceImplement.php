<?php

namespace App\Services\Asrama;

use App\Repositories\Asrama\AsramaRepository;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepository;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepository;
use App\Services\Asrama\AsramaService;
use InvalidArgumentException;

class AsramaServiceImplement implements AsramaService
{
    private $asramaRepository;
    private $fasilitasAsramaRepository;
    private $detailFasilitasAsramaRepository;

    public function __construct(AsramaRepository $asramaRepository, FasilitasAsramaRepository $fasilitasAsramaRepository, DetailFasilitasAsramaRepository $detailFasilitasAsramaRepository)
    {
        $this->asramaRepository = $asramaRepository;
        $this->fasilitasAsramaRepository = $fasilitasAsramaRepository;
        $this->detailFasilitasAsramaRepository = $detailFasilitasAsramaRepository;
    }

    /**
     * Get Data Asrama By Id Asrama
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataAsramaById($id)
    {
        try {
            $data = $this->asramaRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Fasilitas Asrama By Id Fasilitas Asrama
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataFasilitasAsramaById($id)
    {
        try {
            $data = $this->fasilitasAsramaRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All Data Fasilitas Asrama
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataAsrama()
    {
        try {
            $data = $this->asramaRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All Data Fasilitas Asrama
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataFasilitasAsrama()
    {
        try {
            $data = $this->fasilitasAsramaRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Data Fasilitas Asrama
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeAsrama($data)
    {
        try {
            $dataAsrama = $this->asramaRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Data Fasilitas Asrama
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeFasilitasAsrama($data)
    {
        try {
            $data = $this->fasilitasAsramaRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
