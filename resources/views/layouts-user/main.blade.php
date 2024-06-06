<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | PERSEWAAAN ASET</title>
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')

</head>

<body class="font-poppins">

    <div class="flex flex-col sm:flex-row h-screen">
        @include('layouts-user.sidebar')
        <div class="w-full dark:bg-red-200 p-4">

            <div class="w-auto border-1">
                <div class="dark:bg-gray-700">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>



    </div>


    @vite('resources/js/app.js')
    @yield('script')

</body>

</html>
