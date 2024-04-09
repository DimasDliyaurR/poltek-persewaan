@extends('layouts-home.navbar.comp')
@push('styles')
    @livewireStyles
@endpush
@push('scripts')
    @livewireScripts
@endpush
@section('content')
<div class="pt-40 pb-16 bg-slate-100 px-20  ">
    <div class="container">
        <div class="w-full">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                <h2 class="font-bold text-black text-3xl mb-8 sm:text-2xl lg:text-xl"> <a href="/index" class="hover:text-primary">Home  </a>>  Kategori > {{$title}}</h2>
            </div>
            @livewire('kategori')
        </div>
    </div>
</div>    
@endsection