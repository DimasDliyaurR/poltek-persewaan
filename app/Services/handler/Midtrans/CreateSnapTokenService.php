<?php

namespace App\Services\handler\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $param;

    public function __construct(array $data)
    {
        parent::__construct();
        $this->param = $data;
    }

    public function getSnapToken()
    {
        $params = $this->param;
        $snapToken = Snap::getSnapToken($params);
        return $snapToken;
    }
}
