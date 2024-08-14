@extends('layouts-admin.main')

@section('content')

    <x-back />

    <x-title-component>
        Form Update {{ $title }}
    </x-title-component>

    <x-inner-layout>
        @session('successForm')
            <x-alert-success>
                {{ $value }}
            </x-alert-success>
        @endsession

        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level
                    Promo</label>
                <select name="level"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue file:text-violet-700 hover:file:bg-blue-400 @error('level') border-red-500 @enderror"
                    id="multiple_files" type="text">
                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>SUPER ADMIN</option>
                    <option value="customer" {{ $user->level == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="admin_dpupk" {{ $user->level == 'admin_dpupk' ? 'selected' : '' }}>DPUK</option>
                    <option value="admin_keuangan" {{ $user->level == 'admin_keuangan' ? 'selected' : '' }}>KEUANGAN
                    <option value="admin_kendaraan" {{ $user->level == 'admin_kendaraan' ? 'selected' : '' }}>ADMIN
                        KENDARAAN</option>
                    <option value="admin_asrama" {{ $user->level == 'admin_asrama' ? 'selected' : '' }}>ADMIN ASRAMA
                    </option>
                    <option value="admin_alat_barang" {{ $user->level == 'admin_alat_barang' ? 'selected' : '' }}>ADMIN ALAT
                        BARANG</option>
                    <option value="admin_gedung_lap" {{ $user->level == 'admin_gedung_lap' ? 'selected' : '' }}>ADMIN
                        GEDUNG LAPANGAN</option>
                    <option value="admin_layanan" {{ $user->level == 'admin_layanan' ? 'selected' : '' }}>ADMIN LAYANAN
                    </option>
                </select>
                @error('level')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button id="submit" class="p-2 w-80 bg-gray-900 rounded-md text-white text-sm">Submit</button>
        </form>
    </x-inner-layout>
@endsection

@section('script')
    <script src="{{ asset('js/validasi/promoForm.js') }}"></script>
@endsection
