<?php

namespace App\Workflows\Activity;

use Workflow\Activity;

class AfterPaymentActivity extends Activity
{
    public function execute($data)
    {
        return $data["status"];
    }
}
