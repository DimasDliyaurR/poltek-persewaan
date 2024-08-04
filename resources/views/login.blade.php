@extends('layouts-home.navbar.nav')
@section('content')
    <div class=" grid place-items-center h-screen justify-center bg-gray-200">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="text-center text-3xl mb-3 block">Login</h1>

            <hr class="mt-4 mb-4 border-t-1 border-primary">
            Selamat Datang di Sewa Aset
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="username" class=""></label>
                    <input type="text" value="{{ old('username') }}"
                        class="border w-full text-sm  mb-1 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-md "
                        id="username" name="username" placeholder="username">
                    @error('username')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password"></label>
                    <div class="flex items-center">
                        <input type="password" id="password" name="password" placeholder="password"
                            class="border w-full text-sm mb-2 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-l-md">
                        <span id="visibleEye"
                            class="p-[0.4rem] border-r border-y border-gray-500 text-sm mb-2 hover:bg-gray-50 focus:outline-none focus:ring-0 focus:border-grat-600 rounded-r-md"><svg
                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg></span>
                    </div>
                    @error('password')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <input class="rouded-sm" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="ml-1 text-sm" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button
                    class="w-full mt-5 p-1 bg-primary text-white rounded-md hover:bg-transparent hover:text-primary hover:font-semibol hover:border-2  hover:border-primary">Login</button>

                @if (Route::has('password.request'))
                    <a class="text-sm hover:underline mt-5 block" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi ?') }}
                    </a>
                @endif
            </form>
            <p class="text-xs mt-12 mb-6 text-center">Dengan login ke akun, berarti Anda telah menyetujui <span
                    class="text-primary">Syarat dan Ketentuan </span>serta <span class="text-primary">Pernyataan Privasi
                </span>kami.</p>
            <hr class=" mb-4border-t-1 border-primary">
            <p class="text-xs text-center  pt-5"> <i class="fa-regular fa-copyright"></i>Belum memiliki akun? <a
                    href="{{ asset('register') }}"><span class="text-primary">Daftar</span></a></p>
        </div>
    </div>
@endsection

@push('script')
    <script type="module">
        $(document).ready(function() {
            const openEye =
                `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`
            const closeEye =
                `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`
            const visible = $("#visibleEye")

            visible.click(function(e) {
                e.preventDefault();
                const passwordInput = $("#password")
                if (passwordInput.attr("type") == "password") {
                    passwordInput.attr("type", "text")
                    visible.empty();
                    visible.append(closeEye);
                } else {
                    passwordInput.attr("type", "password")
                    visible.empty();
                    visible.append(openEye);
                }
            });
        });
    </script>
@endpush
