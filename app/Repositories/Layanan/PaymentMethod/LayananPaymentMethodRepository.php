<?php

namespace App\Repositories\Layanan\PaymentMethod;

interface LayananPaymentMethodRepository
{

    /**
     * Create Layanan Payment Method
     * @param array $data
     */
    public function store(array $data);


    /**
     *  Create Payment Method Alat Barang
     * @param array $data
     * @return array
     */
    public function update(array $data, $id);
}
