<?php

namespace App\Services\Asrama;

use InvalidArgumentException;
use App\Services\Asrama\AsramaService;
use App\Repositories\Asrama\AsramaRepository;
use App\Repositories\Asrama\TipeAsrama\TipeAsramaRepository;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepository;
use App\Repositories\Asrama\DetailFotoTipeAsrama\DetailFotoTipeAsramaRepository;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepository;
use App\Repositories\Asrama\PaymentMethod\AsramaPaymentMethodRepository;

class AsramaServiceImplement implements AsramaService
{
    private $asramaRepository;
    private $fasilitasAsramaRepository;
    private $tipeAsramaRepository;
    private $detailFasilitasAsramaRepository;
    private $detailFotoTipeAsramaRepository;
    private $paymentMethodRepository;

    public function __construct(
        AsramaRepository $asramaRepository,
        FasilitasAsramaRepository $fasilitasAsramaRepository,
        DetailFasilitasAsramaRepository $detailFasilitasAsramaRepository,
        TipeAsramaRepository $tipeAsramaRepository,
        DetailFotoTipeAsramaRepository $detailFotoTipeAsramaRepository,
        AsramaPaymentMethodRepository $paymentMethodRepository
    ) {
        $this->asramaRepository = $asramaRepository;
        $this->fasilitasAsramaRepository = $fasilitasAsramaRepository;
        $this->tipeAsramaRepository = $tipeAsramaRepository;
        $this->detailFasilitasAsramaRepository = $detailFasilitasAsramaRepository;
        $this->detailFotoTipeAsramaRepository = $detailFotoTipeAsramaRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * Get Data Asrama By Id Detail Foto Tipe Asrama
     * @param int $id
     * @return object
     */
    public function getDataFotoTipeAsrama($id)
    {
        $data = $this->detailFotoTipeAsramaRepository->getDataById($id);

        return $data;
    }

    /**
     * Get Data Detail Foto Tipe Asrama By Id Asrama
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataDetailFotoTipeAsramaById($id)
    {
        try {
            $data = $this->detailFotoTipeAsramaRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Tipe Asrama By Id Tipe Asrama Asrama
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataDetailFotoTipeAsramaByTipeAsramaId($id)
    {
        try {
            $data = $this->detailFotoTipeAsramaRepository->getDataByTipeAsramaId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
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
     * Get Data Asrama By Tipe Asrama Id
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataAsramaByTipeAsramaId($id)
    {
        try {
            $data = $this->asramaRepository->getDataByTipeAsramaId($id);
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
    public function getDataDetailFasilitasByTipeAsramaId($id)
    {
        try {
            $data = $this->detailFasilitasAsramaRepository->getAllDataByTipeAsramaId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Tipe Asrama By Tipe Asrama Id
     * @param Id
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Kesalahan Exception
     */
    public function getDataTipeAsramaById($id)
    {
        try {
            $data = $this->tipeAsramaRepository->getDataById($id);
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
    public function getAllDataDetailFotoTipeAsrama()
    {
        try {
            $data = $this->detailFotoTipeAsramaRepository->getAll();
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
     * Get All Data Tipe Asrama
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataTipeAsrama()
    {
        try {
            $data = $this->tipeAsramaRepository->getAll();
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
     * Store Data Foto Tipe Asrama
     * @param  array $data
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeDetailFotoTipeAsrama($data)
    {
        try {
            $dataAsrama = $this->detailFotoTipeAsramaRepository->store($data);
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
     * Store Data Detail Tipe Asrama
     * @param array $data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeTipeAsrama($data)
    {
        try {
            $data = $this->tipeAsramaRepository->store($data);
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
     * Update Detail Foto Tipe Asrama
     * @param array $dara
     * @param int $id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateDetailFotoTipeAsrama($data, $id)
    {
        $data = $this->detailFotoTipeAsramaRepository->update($data, $id);


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
     * Update Detail Tipe Asrama
     * @param array $data
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateTipeAsrama($data, $id)
    {
        try {
            $data = $this->tipeAsramaRepository->update($data, $id);
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
    public function destroyDetailFotoTipeAsrama($id)
    {
        $data = $this->detailFotoTipeAsramaRepository->delete($id);

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
     * Delete Tipe Asrama
     * @param string $id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyTipeAsrama($id)
    {
        try {
            $data = $this->tipeAsramaRepository->delete($id);
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

    /**
     * Search Data Detail Tipe Asrama
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function searchTipeAsrama($data)
    {
        try {
            $data = $this->tipeAsramaRepository->search($data);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
