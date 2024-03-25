@extends('layouts-home.navbar.comp')
@section('content')
<div class="pt-40 pb-16 bg-slate-100 px-20 ">
    <x-comp>
        Ini Halaman Gedung
        
        @slot('img1')
            <img src="{{ ('img/transportasi/minibus.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
        @endslot
        @slot('img2')
            <img src="{{ ('img/transportasi/bus_depan.JPG')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
        @endslot
        @slot('img3')
            <img src="{{ ('img/transportasi/bus_depan.JPG')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
        @endslot
        @slot('img4')
            <img src="{{ ('img/transportasi/bus_depan.JPG')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
        @endslot
        </x-comp>

</div>
@endsection