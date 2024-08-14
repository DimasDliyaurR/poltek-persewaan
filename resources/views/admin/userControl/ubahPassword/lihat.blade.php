@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        {{ $title }}
    </div>

    <x-inner-layout class="">

        @session('success')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        @session('error')
            <x-alert-error>
                {{ $value }}
            </x-alert-error>
        @endsession

        <form action="{{ route('admin.changePassword') }}" method="post" id="formChangePassword">
            @csrf
            <div class="mb-5">
                <label for="password_lama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                    Lama</label>
                <input name="password_lama"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('password_lama') border-red-500 @enderror"
                    value="{{ old('password_lama') }}" type="password">

                @error('password_lama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                    Baru</label>
                <input name="password"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('password') border-red-500 @enderror"
                    value="{{ old('password') }}" type="password">

                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
                <input name="password_confirmation"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error('password_confirmation') border-red-500 @enderror"
                    value="{{ old('password_confirmation') }}" type="password">

                @error('password_confirmation')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <input class="rouded-sm" type="checkbox" id="eyeVision">

                <label class="ml-1 text-sm" for="eyeVision">
                    Tampilkan password
                </label>
            </div>

            <button class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>

    </x-inner-layout>
@endsection

@section('script')
    <script type="module" src="{{ asset('js/feature/admin-show-hidde-password.js') }}"></script>
@endsection
