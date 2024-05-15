<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepositoryImplement implements UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get All Users
     * @return boolean
     */
    public function getAll()
    {
        return $this->user::with("profile");
    }

    /**
     * Create User
     * @param array $data
     * @return boolean
     */
    public function create($data)
    {
        return $this->user::create($data);
    }
}
