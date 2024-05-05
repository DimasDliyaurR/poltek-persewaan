<?php

namespace App\Repositories\Kendaraan\PaymentMethod;

use App\Models\KendaraanPaymentMethod;

class KendaraanPaymentMethodRepositoryImplement implements KendaraanPaymentMethodRepository
{
    private $kendaraanPaymentMethodModel;

    public function __construct(KendaraanPaymentMethod $kendaraanPaymentMethodModel)
    {
        $this->kendaraanPaymentMethodModel = $kendaraanPaymentMethodModel;
    }

    /**
     * Create Payment Method Kendaraan
     * @param array $data
     * @return object  
     */
    public function store(array $data)
    {
        return $this->kendaraanPaymentMethodModel::create($data);
    }
}
