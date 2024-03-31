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
     * Get Data Detail Fasilitas By Asrama Id
     * @param Id
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Kesalahan Exception
     */
    public function getDataDetailFasilitasByAsramaId($id)
    {
        try {
            $data = $this->detailFasilitasAsramaRepository->getAllDataByAsramaId($id);
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

    /**
     * Store Data Detail Fasilitas Asrama
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeDetailFasilitasAsrama($data)
    {
        // try {
        $data = $this->detailFasilitasAsramaRepository->store($data);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

        return $data;
    }

    /**
     * Update Asrama
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateAsrama($data, $id)
    {
        try {
            $data = $this->asramaRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Fasilitas Asrama
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateFasilitasAsrama($data, $id)
    {
        try {
            $data = $this->fasilitasAsramaRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Detail Fasilitas Asrama
     * @param data array
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateDetailFasilitasAsrama($data, $id)
    {
        try {
            $data = $this->detailFasilitasAsramaRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Asrama
     * @param id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyAsrama($id)
    {
        try {
            $data = $this->asramaRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Fasilitas Asrama
     * @param id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyFasilitasAsrama($id)
    {
        try {
            $data = $this->fasilitasAsramaRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Fasilitas Asrama
     * @param id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyDetailFasilitasAsrama($id)
    {
        try {
            $data = $this->detailFasilitasAsramaRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Data Detail Fasilitas Asrama
     * @param id
     * @param dataFasilitasId
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function IsExistFasilitasTransaksi($dataFasilitasId, $id)
    {
        try {
            $data = $this->detailFasilitasAsramaRepository->IsExistFasilitasTransaksi($dataFasilitasId, $id);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Search Data Detail Fasilitas Asrama
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function searchAsrama($data)
    {
        try {
            $data = $this->asramaRepository->search($data);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
