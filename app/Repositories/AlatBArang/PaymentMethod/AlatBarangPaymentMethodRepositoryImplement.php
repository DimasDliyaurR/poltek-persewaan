<?php

namespace App\Repositories\AlatBarang\PaymentMethod;

use App\Models\AlatBarangPaymentMethod;

class AlatBarangPaymentMethodRepositoryImplement implements AlatBarangPaymentMethodRepository
{
    private $AlatBarangPaymentMethodModel;

    public function __construct(AlatBarangPaymentMethod $alatBarangPaymentMethod)
    {
        $this->AlatBarangPaymentMethodModel = $alatBarangPaymentMethod;
    }

    /**
     *  Create Payment Method Alat Barang
     * @param array $data
     * @return array
     */
    public function store(array $data)
    {
        return $this->AlatBarangPaymentMethodModel::create($data);
    }

    /**
     *  Create Payment Method Alat Barang
     * @param array $data
     * @return array
     */
    public function update(array $data, $id)
    {
        return $this->AlatBarangPaymentMethodModel::findOrFail($id)->update($data);
    }
}
