<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Traits\RegisterUser;

class RegistrationController extends Controller
{
    use RegisterUser;

    protected $userService;

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $user)
    {
        $this->userService = $user;
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::transaction(function () use ($data) {

            $user = $this->userService->createUser([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'level' => "customer",
            ]);

            $this->userService->createProfile([
                "user_id" => $user->id,
                "nama_lengkap" => $data["nama_lengkap"],
                "foto_ktp" => $data["foto_ktp"],
                "alamat" => $data["alamat"],
                "no_telp" => $data["no_telp"],
                "slug" => Str::slug($data["username"]),
            ]);

            return $user;
        });
    }
}