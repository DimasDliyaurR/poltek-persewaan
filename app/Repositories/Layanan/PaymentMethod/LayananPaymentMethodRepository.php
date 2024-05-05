<?php

namespace App\Repositories\Layanan\PaymentMethod;

interface LayananPaymentMethodRepository
{

    /**
     * Create Layanan Payment Method
     * @param array $data
     */
    public function store(array $data);
}
