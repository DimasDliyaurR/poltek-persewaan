<?php

namespace App\Services\User;

use App\Repositories\User\LogActivity\LogActivityRepository;
use App\Repositories\User\Profile\ProfileRepository;
use App\Repositories\User\UserRepository;
use InvalidArgumentException;

class UserServiceImplement implements UserService
{
    protected $userRepository;
    protected $profileRepository;
    protected $logActivityRepository;

    public function __construct(UserRepository $userRepository, ProfileRepository $profileRepository, LogActivityRepository $logActivityRepository)
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
        $this->logActivityRepository = $logActivityRepository;
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
     * Get All Data Activity log
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllActivityLog()
    {
        try {
            $data = $this->logActivityRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All With User Data Activity log
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getAllActivityLogWithUser()
    {
        try {
            $data = $this->logActivityRepository->getAllWithUser();
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
     * Get Data User By Id
     * @param integer $id
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function getDataUserById($id)
    {
        try {
            $data = $this->userRepository->getDataById($id);
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

    /**
     * Update Data User
     * @param array $data
     * @param int $id
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function updateUser($data, $id)
    {
        $data = $this->userRepository->update($data, $id);

        return $data;
    }

    /**
     * Update Data Profile
     * @param array $data
     * @param int $id
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function updateProfile($data, $id)
    {
        $data = $this->profileRepository->update($data, $id);

        return $data;
    }
}
