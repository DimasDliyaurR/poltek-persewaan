<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\user\RequestRegister;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegisterUser
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \App\Http\Requests\user\RequestRegister  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(RequestRegister $request)
    {
        $validation = $request->validated();


        if ($request->hasFile('foto_ktp')) {
            $file_ktp = $request->file('foto_ktp');
            $foto_ktp = $file_ktp->hashName();

            $foto_ktp_path = $file_ktp->storeAs("/ktp", $foto_ktp);
            $foto_ktp_path = Storage::disk("public")->put("/ktp", $file_ktp);
            $validation['foto_ktp'] = $foto_ktp_path;
        }

        event(new Registered($user = $this->create($validation)));

        $this->guard()->login($user, true);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
