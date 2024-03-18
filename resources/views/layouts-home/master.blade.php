<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('layouts-home.navbar.nav')
    
    @yield('content')
    <footer class="bg-plaster pt-24 pb-12">
        @include('layouts-home.footer.foot')
    </footer>
    @vite('resources/js/app.js')
</body>
</html>