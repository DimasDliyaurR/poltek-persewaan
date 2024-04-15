<?php

namespace App\Services\User;

use App\Repositories\User\Profile\ProfileRepository;
use App\Repositories\User\UserRepository;
use InvalidArgumentException;

class UserServiceImplement implements UserService
{
    protected $userRepository;
    protected $profileRepository;

    public function __construct(UserRepository $userRepository, ProfileRepository $profileRepository)
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
    }

    /**
     * Get All Data User
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllUser()
    {
        try {
            $data = $this->userRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All Data Profile
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllProfile()
    {
        try {
            $data = $this->profileRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Profile By Id
     * @param integer $id
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getDataProfileById($id)
    {
        try {
            $data = $this->profileRepository->getAllById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Create Data User
     * @param array $data
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function createUser($data)
    {
        // try {
        $data = $this->userRepository->create($data);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

        return $data;
    }

    /**
     * Create Data Profile
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function createProfile($data)
    {
        // try {
        $data = $this->profileRepository->create($data);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

        return $data;
    }
}
