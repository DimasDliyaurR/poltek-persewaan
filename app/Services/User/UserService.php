<?php

namespace App\Services\User;


interface UserService
{
    /**
     * Get All Data User
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllUser();

    /**
     * Get All Data Profile
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllProfile();

    /**
     * Get All Data Activity log
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllActivityLog();

    /**
     * Get All With User Data Activity log
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllActivityLogWithUser();

    /**
     * Get Data Profile By Id
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataProfileById($id);

    /**
     * Get Data User By Id
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataUserById($id);

    /**
     * Create Data User
     * @param array $data
     * @return object
     * @throws InvalidArgumentException
     */
    public function createUser($data);

    /**
     * Create Data Profile
     * @return object
     * @throws InvalidArgumentException
     */
    public function createProfile($data);

    /**
     * Update Data User
     * @param array $data
     * @param int $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function updateUser($data, $id);

    /**
     * Update Data Profile
     * @param array $data
     * @param int $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function updateProfile($data, $id);
}
