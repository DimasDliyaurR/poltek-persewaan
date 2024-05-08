<?php

namespace App\Repositories\Kendaraan\PaymentMethod;

interface KendaraanPaymentMethodRepository
{
    /**
     * Create Payment Method Kendaraan
     * @param array $data
     * @return object  
     */
    public function store(array $data);

    /**
     *  Create Payment Method Alat Barang
     * @param array $data
     * @return array
     */
    public function update(array $data, $id);
}
