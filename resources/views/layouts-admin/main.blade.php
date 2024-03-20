<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | PERSEWAAN ASET</title>
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-800">

    @include('layouts-admin.nav')
    <div class="flex flex-col sm:flex-row">
        @include('layouts-admin.sidebar')

        <div class="w-full bg-gray-100 dark:bg-red-200 p-4">

            <div class="w-auto border-1">
                <div class="bg-gray-100 dark:bg-gray-700">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>



    @vite('resources/js/app.js')
    <script src="{{ asset('js/feature/dark-mode.js') }}"></script>

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js"></script>
    <script src="{{ asset('js/feature/editor.js') }}"></script>
</body>

</html>
