<?php

namespace App\Repositories\User;

interface UserRepository
{
    /**
     * Get All Users
     * @return object
     */
    public function getAll();

    /**
     * Get Users By Id
     * @param int $id
     * @return object
     */
    public function getDataById($id);

    /**
     * Create User
     * @param array $data
     * @return object
     */
    public function create($data);

    /**
     * Create User
     * @param int $id
     * @param array $data
     * @return object
     */
    public function update($data, $id);
}
