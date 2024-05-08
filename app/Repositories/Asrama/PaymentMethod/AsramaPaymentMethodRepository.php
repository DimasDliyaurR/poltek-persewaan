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

    /**
     *  Create Payment Method Asrama
     * @param array $data
     * @return array
     */
    public function update(array $data, $id);
}
