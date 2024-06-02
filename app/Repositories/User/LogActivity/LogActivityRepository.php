<?php

namespace App\Repositories\User\LogActivity;

interface LogActivityRepository
{
    /**
     *  Get All Activity Log
     * @return object
     */
    public function getAll();

    /**
     *  Get All with user Activity Log
     * @return object
     */
    public function getAllWithUser();
}
