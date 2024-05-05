<?php

namespace App\Repositories\GedungLap\PaymentMethod;

use App\Models\GedungLapPaymentMethod;

class GedungLapPaymentMethodRepositoryImplement implements GedungLapPaymentMethodRepository
{

    private $gedungLapPaymentMethodModel;

    public function  __construct(GedungLapPaymentMethod $gedungLapPaymentMethod)
    {
        $this->gedungLapPaymentMethodModel = $gedungLapPaymentMethod;
    }

    /**
     * Create Gedung Lapangan Payment Method
     * @param array $data
     * @return object
     */
    public function store(array $data)
    {
        return $this->gedungLapPaymentMethodModel::create($data);
    }
}
