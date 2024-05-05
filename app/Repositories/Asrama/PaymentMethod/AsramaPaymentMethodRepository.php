<?php

namespace App\Repositories\Asrama\PaymentMethod;

interface AsramaPaymentMethodRepository
{
    /**
     * Create Payment Method Asrama
     * @param array $data
     * @return object
     */
    public function store(array $data);
}
