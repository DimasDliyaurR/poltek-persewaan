@extends('layouts-admin.main')

@section('content')
    <x-title-component>
        Detail User
    </x-title-component>


    <x-inner-layout>
        <div class="flex flex-col">
            {{-- Username --}}
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Username</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $user->username }}</span>
            </div>

            {{-- Email --}}
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Email</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $user->email }}</span>
            </div>

            {{-- Email --}}
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Level</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $user->level }}</span>
            </div>

            {{-- Email --}}
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Alamat</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $user->profile->alamat }}</span>
            </div>

            {{-- Email --}}
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">No. HP</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $user->profile->no_telp }}</span>
            </div>
        </div>
    </x-inner-layout>
@endsection
