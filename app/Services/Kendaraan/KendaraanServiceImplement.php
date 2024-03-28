<?php

namespace App\Services\Kendaraan;

use App\Models\DetailTransaksiKendaraan;
use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\Kendaraan\MerkKendaraan\MerkKendaraanRepository;
use App\Services\Kendaraan\KendaraanService;
use InvalidArgumentException;

class KendaraanServiceImplement implements KendaraanService
{
    private $kendaraanRepository;
    private $merkKendaraanRepository;
    private $detailTransaksiKendaraan;

    public function __construct(KendaraanRepository $kendaraanRepository, MerkKendaraanRepository $merkKendaraanRepository, DetailTransaksiKendaraan $detailTransaksiKendaraan)
    {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->merkKendaraanRepository = $merkKendaraanRepository;
        $this->detailTransaksiKendaraan = $detailTransaksiKendaraan;
    }

    /**
     * Get Data Kendaraan By Id Kendaraan
     * @param id
     * @return Array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getDataKendaraanById($id)
    {
        try {
            $data = $this->kendaraanRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Merk Kendaraan By Id Merk Kendaraan
     * @param Id
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getDataMerkKendaraanById($id)
    {
        try {
            $data = $this->merkKendaraanRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Data Kendaraan
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataKendaraan()
    {
        try {
            $data = $this->kendaraanRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Data Kendaraan
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataKendaraanWithMerkKendaraan()
    {
        try {
            $data = $this->kendaraanRepository->getAllDataWithMerkKendaraan();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Data Merk Kendaraan
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataMerkKendaraan()
    {
        try {
            $data = $this->merkKendaraanRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     *  Store Data Kendaraan
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function storeKendaraan($data)
    {
        try {
            $data = $this->kendaraanRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     *  Store Data Merk Kendaraan
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function storeMerkKendaraan($data)
    {
        try {
            $data = $this->merkKendaraanRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Data Kendaraan
     * @param data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function updateKendaraan($data, $id)
    {
        try {
            $data = $this->kendaraanRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Data Merk Kendaraan
     * @param data , id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function updateMerkKendaraan($data, $id)
    {
        try {
            $data = $this->merkKendaraanRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Data Kendaraan
     * @param id
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function destroyKendaraan($id)
    {
        try {
            $data = $this->kendaraanRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Data Merk Kendaraan
     * @param id
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function destroyMerkKendaraan($id)
    {
        try {
            $data = $this->merkKendaraanRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Order By Data Merk Kendaraan
     * @param column
     * @param order
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function orderByMerkKendaraan($column, $order)
    {
        try {
            $data = $this->merkKendaraanRepository->orderBy($column, $order);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Search Data Merk Kendaraan
     * @param data
     * @return array
     */
    public function searchMerkKendaraan($data)
    {
        try {
            $data = $this->merkKendaraanRepository->search($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
