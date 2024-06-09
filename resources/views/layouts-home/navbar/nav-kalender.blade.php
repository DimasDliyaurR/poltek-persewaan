<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}| PERSEWAAAN ASET</title>
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.11/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="mx-5 my-5">
    <div class="cursor-pointer " title="Kembali ke halaman utama">
        <a href="/"><i class="bi bi-arrow-left" style="font-size: 30px;"></i></a>
    </div>
    <h1 class="text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
            </div>
        </div>
    </div>
    <div id="calendar">
    </div>
    @yield('script')

</body>

</html>
