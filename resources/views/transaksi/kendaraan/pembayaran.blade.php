@extends('layouts-home.navbar.nav-old')
@section('content')
    <div class="w-screen h-screen flex flex-row justify-center items-center">
        <button class="p-4 bg-primary text-white rounded-lg" id="pay-button">Pembayaran</button>
    </div>
@endsection

@section('head')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
@endsection

@section('script')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}');
            // customer will be redirected after completing payment pop-up
        });
    </script>
@endsection
