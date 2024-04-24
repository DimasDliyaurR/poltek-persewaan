@extends('layouts-user.main')
@section('content')
    <div class="flex flex-wrap h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <div class="xl:w-1/2 p-7">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <h4 class="text-2xl font-bold "> Halo, ... User !</h4>
        </p>
        </div>
        <div class="flex mx-auto xl:w-1/2 relative">
            <img src="{{('img/icon-dash.png')}}" alt="hallo icon" class="w-full xl:h-screen">
        </div>
    </div>  
    <div class="grid grid-cols-2 gap-4 mb-4 xl:mb-60">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div>
    </div>
@endsection