<?php

namespace App\Repositories\User\Profile;

use App\Models\Profile;

class ProfileRepositoryImplement implements ProfileRepository
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get All Profiles
     * @return object
     */
    public function getAll()
    {
        return $this->profile::with("user");
    }

    /**
     * Get Data Profiles By Id
     * @param integer $id
     * @return object
     */
    public function getAllById($id)
    {
        return $this->profile::with("user")->whereUserId($id);
    }

    /**
     * Create Profile
     * @param array $data
     * @return object
     */
    public function create($data)
    {
        return $this->profile::create($data);
    }
}
