<?php

namespace App\Services\User;

interface UserService
{
    /**
     * Get All Data User
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllUser();

    /**
     * Get All Data Profile
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllProfile();

    /**
     * Get Data Profile By Id
     * @param integer $id
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getDataProfileById($id);

    /**
     * Create Data User
     * @param array $data
     * @return object
     * @throws InvalidArgumentException
     */
    public function createUser($data);

    /**
     * Create Data Profile
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function createProfile($data);
}
