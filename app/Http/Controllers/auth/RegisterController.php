<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Traits\RegisterUser;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegisterUser;

    protected $userService;
    protected $user;

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, User $user)
    {
        $this->user = $user;
        $this->userService = $userService;
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
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
    }
}
