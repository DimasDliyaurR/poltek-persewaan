<?php

namespace App\Repositories\GedungLap\PaymentMethod;

interface GedungLapPaymentMethodRepository
{
    /**
     * Create Gedung Lapangan Payment Method
     * @param array $data
     * @return object
     */
    public function store(array $data);


    /**
     *  Create Payment Method Gedung Lap
     * @param array $data
     * @return array
     */
    public function update(array $data, $id);
}
