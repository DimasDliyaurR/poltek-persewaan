@extends('layouts-admin.main')

@section('content')
    <x-inner-layout>



        <x-title-component>
            Foto Promo
        </x-title-component>

        @if ($promo->p_foto != null)
            <img src="{{ Storage::url($promo->p_foto) }}" alt="Foto Kendaraan" class="h-auto max-w-lg mx-auto">
        @endif

        <hr class="h-px my-4 border-gray-400 border-1">

        <x-title-component>
            Detail Promo
        </x-title-component>

        <hr class="h-px my-4 border-gray-400 border-1">

        <div class="flex flex-col">
            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Judul Promo</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $promo->p_judul }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Kode Promo</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $promo->p_kode }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Isi Promo</span>
                <span class="p-4 rounded-lg bg-gray-100">
                    @if ($promo->p_tipe == 'fixed')
                        Rp. {{ number_format($promo->p_isi, 0, ',', '.') }}
                    @else
                        {{ $promo->p_isi }} %
                    @endif
                </span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Countdown Promo</span>
                <p class="p-4 rounded-lg bg-gray-100" id="time"></p>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Tipe Promo</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $promo->p_isi }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Keaktivan</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $promo->p_is_aktif ? 'Aktif' : 'Non aktif' }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Status Ketersediaan</span>
                <span class="p-4 rounded-lg bg-gray-100">{{ $promo->p_is_umum ? 'Umum' : ' Tidak Umum' }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <span class="font-semibold mb-3">Stok Kapasitas</span>
                <span
                    class="p-4 rounded-lg bg-gray-100">{{ $promo->p_tipe_stok == 'unlimited' ? '∞ ' : $promo->p_jumlah }}</span>
            </div>
        </div>
    </x-inner-layout>
@endsection

@section('script')
    <script src="{{ asset('js/validasi/promoForm.js') }}"></script>
    <script>
        // Inisialisasi
        var countdown = document.getElementById("time")
        // Converting string to required date format 
        let deadline = new Date()
            .getTime();

        // To call defined fuction every second
        let x = setInterval(function() {
            // Getting current time in required format
            let now = new Date().getTime();

            // Calculating the difference
            let t = deadline - now;

            console.log(t);

            // Getting value of days, hours, minutes, seconds
            let days = Math.floor(t / (1000 * 60 * 60 * 24));
            let hours = Math.floor(
                (t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor(
                (t % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor(
                (t % (1000 * 60)) / 1000);
            // days + " Hari " + hours + " Jam " + minutes + " Menit " + seconds + " Detik ";

            // Output for over time
            if (t < 0) {
                clearInterval(x);
                countdown
                    .innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection
