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
}
