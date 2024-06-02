<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | PERSEWAAAN ASET</title>
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}">
    <link href="https://icons8.com/icon/E4FAF4hA9ugF/help">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="font-poppins">

    <div class="flex flex-col sm:flex-row h-screen">
        @include('layouts-user.sidebar')
        <div class="w-full bg-gray-100 dark:bg-red-200 p-4">

            <div class="w-auto border-1">
                <div class="bg-gray-100 dark:bg-gray-700">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>



    </div>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


</body>

</html>
