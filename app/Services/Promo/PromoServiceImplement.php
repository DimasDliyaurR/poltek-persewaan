<?php

namespace App\Services\Promo;

use App\Repositories\Promo\DetailUserPromo\DetailUserPromoRepository;
use App\Repositories\Promo\PromoRepository;
use App\Services\Promo\PromoService;
use InvalidArgumentException;

class PromoServiceImplement implements PromoService
{
    private $promoRepository;
    private $detailUserPromoRepository;

    public function __construct(PromoRepository $promoRepository, DetailUserPromoRepository $detailUserPromoRepository)
    {
        $this->promoRepository = $promoRepository;
        $this->detailUserPromoRepository = $detailUserPromoRepository;
    }

    /**
     * Get All Promo
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function getAllPromo()
    {
        try {
            $data = $this->promoRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get Data Promo By Id
     * @param string $id
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function getDataPromoById($id)
    {
        $data = $this->promoRepository->getDataById($id);

        return $data;
    }

    /**
     * Create Data Promo
     * @param array $data
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function createPromo($data)
    {
        try {
            $data = $this->promoRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Create Data Promo
     * @param array $data
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function createDetailUserPromo($data)
    {
        try {
            $data = $this->detailUserPromoRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Store Data Promo
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function storePromo($id)
    {
        try {
            $data = $this->promoRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Update Data Promo
     * @param array $data
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function updatePromo($data, $id)
    {
        try {
            $data = $this->promoRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Destroy Data Promo
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function destroyPromo($id)
    {
        // try {
        $data = $this->promoRepository->destroy($id);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }
        return $data;
    }
}
