<?php

namespace App\Services\Kendaraan;

use App\Models\KendaraanPaymentMethod;
use InvalidArgumentException;
use App\Services\Kendaraan\KendaraanService;
use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\Kendaraan\MerkKendaraan\MerkKendaraanRepository;
use App\Repositories\Kendaraan\PaymentMethod\KendaraanPaymentMethodRepositoryImplement;

class KendaraanServiceImplement implements KendaraanService
{
    private $kendaraanRepository;
    private $merkKendaraanRepository;
    private $paymentMethodRepository;

    public function __construct(
        KendaraanRepository $kendaraanRepository,
        MerkKendaraanRepository $merkKendaraanRepository,
        KendaraanPaymentMethodRepositoryImplement $paymentMethodRepository,
    ) {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->merkKendaraanRepository = $merkKendaraanRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;
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
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePaymentMethod($data)
    {
        try {
            $data = $this->paymentMethodRepository->store($data);
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

    /**
     * Search Data Merk Kendaraan
     * @param data
     * @return array
     */
    public function searchKendaraan($data)
    {
        try {
            $data = $this->kendaraanRepository->search($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
