<?php

namespace App\Repositories\User\Profile;

interface ProfileRepository
{
    /**
     * Get All Profiles
     * @return object
     */
    public function getAll();

    /**
     * Get Data Profiles By Id
     * @param integer $id
     * @return object
     */
    public function getAllById($id);

    /**
     * Create Profile
     * @param array $data
     * @return object
     */
    public function create($data);

    /**
     * Update Profile
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update($data, $id);
}
