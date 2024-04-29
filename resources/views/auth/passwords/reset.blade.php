@extends('layouts-home.navbar.nav')

@section('content')
    <div class=" grid place-items-center h-screen justify-center bg-gray-200">

        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="text-center text-xl mb-3 block">Reset Password</h1>

            <hr class="mt-4 mb-4 border-t-1 border-primary">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row mb-3">
                    <label for="email" class="sr-only">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                            class="border w-full text-sm  mb-1 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-md  @error('email') ring-red-300 @enderror"
                            name="email" placeholder="email" value="{{ old('email') ?? $email }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="bg-none border w-full text-sm  mb-2 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password_confirmation" class="sr-only">Konfirmasi kata sandi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Konfirmasi Password"
                        class="bg-none border w-full text-sm  mb-2 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                        autocomplete="new-password">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit"
                            class="w-full mt-5 p-1 text-sm bg-primary text-white rounded-md hover:bg-orange-500 hover:font-semibol  hover:border-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
            <hr class=" mt-4 border-t-1 border-primary">
            <p class="text-xs text-center  pt-5"> <i class="fa-regular fa-copyright"></i>Belum memiliki akun? <a
                    href="{{ asset('register') }}"><span class="text-primary">Daftar</span></a></p>
        </div>
    </div>
@endsection
