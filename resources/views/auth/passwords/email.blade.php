@extends('layouts-home.navbar.nav')

@section('content')
    <div class=" grid place-items-center h-screen justify-center bg-gray-200">

        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="text-center text-3xl mb-3 block">Login</h1>

            <hr class="mt-4 mb-4 border-t-1 border-primary">
            <p class="text-sm">Forget Password</p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mt-3">
                    <label for="email" class="text-sm sr-only">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                            class="border w-full text-sm  mb-1 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-md  @error('email') ring-red-300 @enderror"
                            name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="my-4">
                    <div class="flex flex-row justify-start items-center">
                        <button type="submit" class="bg-primary w-full text-sm p-2 text-center rounded-lg text-white">
                            {{ __('Send') }}
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
