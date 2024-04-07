<?php

namespace App\Services\AlatBarang;

use App\Repositories\AlatBarang\AlatBarangRepository;
use App\Repositories\AlatBarang\FotoAlatBarang\FotoAlatBarangRepository;
use App\Repositories\AlatBarang\SatuanAlatBarang\SatuanAlatBarangRepository;
use App\Services\AlatBarang\AlatBarangService;
use InvalidArgumentException;

class AlatBarangServiceImplement implements AlatBarangService
{
    private $alatBarangRepository;
    private $satuanAlatBarangRepository;
    private $fotoAlatBarangRepository;

    public function __construct(AlatBarangRepository $alatBarangRepository, FotoAlatBarangRepository $fotoAlatBarangRepository, SatuanAlatBarangRepository $satuanAlatBarangRepository)
    {
        $this->alatBarangRepository = $alatBarangRepository;
        $this->fotoAlatBarangRepository = $fotoAlatBarangRepository;
        $this->satuanAlatBarangRepository = $satuanAlatBarangRepository;
    }

    /**
     * Get Data Alat Barang By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataAlatBarangById($id)
    {
        try {
            $data = $this->alatBarangRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Foto Alat Barang By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataFotoAlatBarangById($id)
    {
        try {
            $data = $this->fotoAlatBarangRepository->getDataByAlatBarangId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Satuan Alat Barang By Id
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataSatuanAlatBarangById($id)
    {
        try {
            $data = $this->satuanAlatBarangRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Mendapatkan semua data pada tabel Foto Alat Barang By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataFotoAlatBarangByAlatBarangId($id)
    {
        try {
            $data = $this->fotoAlatBarangRepository->getDataByAlatBarangId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Alat Barang
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllAlatBarang()
    {
        try {
            $data = $this->alatBarangRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Foto Alat Barang
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllFotoAlatBarang()
    {
        try {
            $data = $this->fotoAlatBarangRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Satuan Alat Barang
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllSatuanAlatBarang()
    {
        try {
            $data = $this->satuanAlatBarangRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Alat Barang
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createAlatBarang($data)
    {
        try {
            $data = $this->alatBarangRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Foto Alat Barang
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createFotoAlatBarang($data)
    {
        try {
            $data = $this->fotoAlatBarangRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Satuan Alat Barang
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createSatuanAlatBarang($data)
    {
        try {
            $data = $this->satuanAlatBarangRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Alat Barang
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateAlatBarang($data, $id)
    {
        try {
            $data = $this->alatBarangRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Foto Alat Barang
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateFotoAlatBarang($data, $id)
    {
        try {
            $data = $this->fotoAlatBarangRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Satuan Alat Barang
     * @param array $data
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateSatuanAlatBarang($data, $id)
    {
        try {
            $data = $this->satuanAlatBarangRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Alat Barang
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyAlatBarang($id)
    {
        try {
            $data = $this->alatBarangRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Foto Alat Barang
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyFotoAlatBarang($id)
    {
        try {
            $data = $this->fotoAlatBarangRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Satuan Alat Barang
     * @param int $id
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroySatuanAlatBarang($id)
    {
        try {
            $data = $this->satuanAlatBarangRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
