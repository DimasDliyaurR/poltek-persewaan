<?php

namespace App\Repositories\AlatBarang\PaymentMethod;

interface AlatBarangPaymentMethodRepository
{
    /**
     *  Create Payment Method Alat Barang
     * @param array $data
     * @return array
     */
    public function store(array $data);
}
