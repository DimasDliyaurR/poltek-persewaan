<?php

declare(strict_types=1);

namespace App\Workflows;

use App\Workflows\Activity\AfterPaymentActivity;
use App\Workflows\Activity\PesanActivity;
use Workflow\ActivityStub;
use Workflow\Workflow;

class TransactionWorkFlow extends Workflow
{
    public function execute($data)
    {
        try {
            if ($pesan = yield ActivityStub::make(PesanActivity::class, $data)) {
                return 1;
            } else if (($afterPayment = yield ActivityStub::make(AfterPaymentActivity::class, $data))) {
                switch ($afterPayment) {
                    case 'terbayar':
                        return 2;
                        break;
                    case 'kadaluarsa':
                        return 3;
                        break;
                    case 'batal':
                        return 4;
                        break;
                }
            }
        } catch (\Throwable $th) {
            yield from $this->compensate();
            throw $th;
        }
    }
}
