<?php

namespace App\Repositories\Layanan\PaymentMethod;

use App\Models\LayananPaymentMethod;

class LayananPaymentMethodRepositoryImplement implements LayananPaymentMethodRepository
{
    private $layananPaymentMethodModel;

    public function __construct(LayananPaymentMethod $layananPaymentMethod)
    {
        $this->layananPaymentMethodModel = $layananPaymentMethod;
    }

    /**
     * Create Layanan Payment Method
     * @param array $data
     */
    public function store(array $data)
    {
        return $this->layananPaymentMethodModel::create($data);
    }


    /**
     *  Create Payment Method Alat Barang
     * @param array $data
     * @return array
     */
    public function update(array $data, $id)
    {
        return $this->layananPaymentMethodModel::findOrFail($id)->update($data);
    }
}
