<?php

namespace App\Repositories\Asrama\PaymentMethod;

use App\Models\AsramaPaymentMethod;

class AsramaPaymentMethodRepositoryImplement implements AsramaPaymentMethodRepository
{
    private $asramaPaymentMethodModel;

    public function __construct(AsramaPaymentMethod $asramaPaymentMethod)
    {
        $this->asramaPaymentMethodModel = $asramaPaymentMethod;
    }

    /**
     * Create Payment Method Asrama
     * @param array $data
     * @return object
     */
    public function store(array $data)
    {
        return $this->asramaPaymentMethodModel::create($data);
    }


    /**
     *  Create Payment Method Asrama
     * @param array $data
     * @return array
     */
    public function update(array $data, $id)
    {
        return $this->asramaPaymentMethodModel::findOrFail($id)->update($data);
    }
}
