<?php

namespace App\Repositories\User;

interface UserRepository
{
    /**
     * Get All Users
     * @return boolean
     */
    public function getAll();

    /**
     * Create User
     * @param array $data
     * @return boolean
     */
    public function create($data);
}
