<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 NOT FOUND</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-screen h-screen flex justify-center items-center flex-col bg-slate-400">
        <img src="{{ asset('img/no-found.jpg') }}" alt="">

        <div>
            <div class="w-auto flex justify-center">
                <span class="text-[40px]">404</span>
                <span class="text-[40px] font-bold ">PageNotFound</span>
            </div>
            <p class="text-2xl w-auto flex justify-center">Look like you're need home !</p>
        </div>

        <a href="{{ asset('/') }}" class="p-3 bg-primary text-plaster rounded-lg mt-3">Home</a>
    </div>
</body>

</html>
