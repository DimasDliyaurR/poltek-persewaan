<?php

namespace App\Services\Promo;

use app\Repositories\Promo\PromoRepository;
use App\Services\Promo\PromoService;
use InvalidArgumentException;

class PromoServiceImplement implements PromoService
{
    private $promoRepository;

    public function __construct(PromoRepository $promoRepository)
    {
        $this->promoRepository = $promoRepository;
    }

    /**
     * Get All Promo
     * @param array $data
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function getAllPromo($data)
    {
        try {
            $data = $this->promoRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
