@extends('layouts-home.master')
@section('content')
    <!-- if -->

    <!-- end if -->
    <div class="bg-plaster">
        <div class="container px-24 py-24 mx-auto">
            <div class="flex justify-between items-center font-bold xl:ml-36 md:ml-36 lg:ml-36  mb-2">
            </div>
            <div class="bg-white w-full h-full xl:w-1/2 md:w-1/2 lg:w-1/2 m-auto xl:p-10 p-5 py-12 ">
                <div class=" flex justify-between mt-2">
                    <div class="flex">
                        <img src="{{ asset('img/LogoPoltekbang.png') }}" class="h-11 w-15 " alt="Logo ">
                        <p class="font-bold xl:text-xl text-sm">SEWA ASET <br>
                            <span class="text-lg">POLITEKNIK PENERBANGAN SURABAYA</span>
                        </p>
                    </div>
                </div>
                <div class="flex  mb-2 mt-2 py-10">
                    <h4 class="uppercase">Detail Pesanan</h4>
                </div>
                <div class="relative overflow-x-auto ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class=" text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-1 py-3">Tipe Ruangan</th>
                                <th scope="col" class="px-6 py-3">Check In</th>
                                <th scope="col" class="px-6 py-3">Check Out</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailTransaksi as $item)
                                @foreach ($item->asramas as $subItem)
                                    <tr class="bg-white border-b">
                                        <td class="px-1 py-4">{{ $subItem->a_nama_ruangan }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($item->ta_check_in)->isoFormat('D MMM Y') }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($item->ta_check_out)->isoFormat('D MMM Y') }}</td>
                                        <td class="px-6 py-4">Rp
                                            {{ number_format(!$subItem->tipeAsrama->paymentMethod->is_dp ? $subItem->tipeAsrama->ta_tarif : $subItem->tipeAsrama->paymentMethod->tarif_dp, 0, ',', '.') }}

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            @if ($totalPromo)
                                <tr>
                                    <td colspan="3" class="px-6 py-1">Diskon </td>
                                    <td class="px-6 py-1">Rp {{ number_format($totalPromo, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="3" class="px-6 py-4">Sub Total </td>
                                <td class="px-6 py-4">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="flex justify-end">
                    <div id="pay-button"
                        class="flex cursor-pointer hover:bg-orange-300 items-center p-4 h-10 text-white mt-4 rounded-md bg-primary w-20">
                        Bayar!
                    </div>
                </div>
                <div id="snap-container"></div>
            </div>
        </div>
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
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href =
                        "{{ route('invoice.asrama', $detailTransaksi[0]->code_unique) }}"
                    console.log(result);
                }
            })
            // customer will be redirected after completing payment pop-up
        });
    </script>
@endsection
