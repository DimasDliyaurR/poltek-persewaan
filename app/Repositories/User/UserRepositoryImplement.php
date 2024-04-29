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
     * Get Users By Id
     * @param int $id
     * @return boolean
     */
    public function getDataById($id)
    {
        return $this->user::with("profile")->findOrFail($id);
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

    /**
     * Create User
     * @param int $id
     * @param array $data
     * @return boolean
     */
    public function update($data, $id)
    {
        return $this->user::findOrFail($id)->update($data);
    }
}
