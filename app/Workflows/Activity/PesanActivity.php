<?php

namespace App\Workflows\Activity;

use Workflow\Activity;

class PesanActivity extends Activity
{
    public function execute($data)
    {
        return $data["status"] == "belum bayar";
    }
}
