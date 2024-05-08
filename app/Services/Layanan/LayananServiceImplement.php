<?php

namespace App\Services\Layanan;

use App\Repositories\Layanan\DetailFotoLayanan\DetailFotoLayananRepository;
use App\Repositories\Layanan\LayananRepository;
use App\Repositories\Layanan\PaymentMethod\LayananPaymentMethodRepository;
use App\Repositories\Layanan\TimLayanan\TimLayananRepository;
use App\Repositories\Layanan\TransaksiLayanan\TransaksiLayananRepository;
use App\Repositories\Layanan\VideoLayanan\VideoLayananRepository;
use App\Services\Layanan\LayananService;
use InvalidArgumentException;

class LayananServiceImplement implements LayananService
{
    private $layananRepository;
    private $detailFotoLayananRepository;
    private $timLayananRepository;
    private $videoLayananRepository;
    private $paymentMethodRepository;

    public function __construct(
        LayananRepository $layananRepository,
        DetailFotoLayananRepository $detailFotoLayananRepository,
        TimLayananRepository $timLayananRepository,
        VideoLayananRepository $videoLayananRepository,
        LayananPaymentMethodRepository $paymentMethodRepository
    ) {
        $this->layananRepository = $layananRepository;
        $this->detailFotoLayananRepository = $detailFotoLayananRepository;
        $this->timLayananRepository = $timLayananRepository;
        $this->videoLayananRepository = $videoLayananRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * Get Data Layanan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataLayananById($id)
    {
        try {
            $data = $this->layananRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Layanan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoLayananById($id)
    {
        try {
            $data = $this->detailFotoLayananRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Layanan By Layanan Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoLayananByLayananId($id)
    {
        try {
            $data = $this->detailFotoLayananRepository->getDataByLayananId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Layanan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataTimLayananById($id)
    {
        try {
            $data = $this->timLayananRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Layanan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataVideoLayananById($id)
    {
        try {
            $data = $this->videoLayananRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Layanan By Layanan Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataVideoLayananByLayananId($id)
    {
        try {
            $data = $this->videoLayananRepository->getDataByLayananId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Layanan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllLayanan()
    {
        try {
            $data = $this->layananRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Detail Foto Layanan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailFotoLayanan()
    {
        try {
            $data = $this->detailFotoLayananRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Tim Layanan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllTimLayanan()
    {
        try {
            $data = $this->timLayananRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Tim Layanan By Layanan Id
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllTimLayananByLayananId($id)
    {
        try {
            $data = $this->timLayananRepository->getDataByLayananId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Video Layanan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllVideoLayanan()
    {
        try {
            $data = $this->videoLayananRepository->getAll();
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
     * Store Layanan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeLayanan($data)
    {
        try {
            $data = $this->layananRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Detail Foto Layanan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailFotoLayanan($data)
    {
        try {
            $data = $this->detailFotoLayananRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Tim Layanan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeTimLayanan($data)
    {
        try {
            $data = $this->timLayananRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Video Layanan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeVideoLayanan($data)
    {
        try {
            $data = $this->videoLayananRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Alat Barang
     * @param array $data
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePaymentMethod($data, $id)
    {
        try {
            $data = $this->paymentMethodRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Layanan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateLayanan($data, $id)
    {
        try {
            $data = $this->layananRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Detail Foto Layanan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateDetailFotoLayanan($data, $id)
    {
        try {
            $data = $this->detailFotoLayananRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Tim Layanan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateTimLayanan($data, $id)
    {
        try {
            $data = $this->timLayananRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Tim Layanan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateVideoLayanan($data, $id)
    {
        try {
            $data = $this->videoLayananRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyLayanan($id)
    {
        try {
            $data = $this->layananRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Detail Foto Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyDetailFotoLayanan($id)
    {
        try {
            $data = $this->detailFotoLayananRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Tim Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyTimLayanan($id)
    {
        try {
            $data = $this->timLayananRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Video Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyVideoLayanan($id)
    {
        try {
            $data = $this->videoLayananRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
