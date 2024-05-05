<?php

namespace App\Repositories\Asrama\PaymentMethod;

use App\Models\AsramaPaymentMethod;

class AsramaPaymentMethodRepository implements AsramaPaymentMethodRepository
{
    private $asramaPaymentMethodModel;

    public function __construct(AsramaPaymentMethod $asramaPaymentMethod)
    {
        $this->asramaPaymentMethodModel = $asramaPaymentMethod;
    }

    /**
     * Create Payment Method Asrama
     * @param array $data
     * @return object
     */
    public function store(array $data)
    {
        return $this->asramaPaymentMethodModel::create($data);
    }
}
