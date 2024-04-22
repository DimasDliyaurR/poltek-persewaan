@extends('layouts-home.navbar.nav-transaksi')
@section('content')

<div class="bg-plaster">
    <div class="  pb-36 pt-36 mx-auto w-2/3 h-full ">
        <div class="container bg-white p-6 rounded-md ">
            <h4 class="  font-semibold mb-6 ">Pemesanan *nama kategori*</h4>
            <form action="" method="post">
                @csrf
                <div class="flex space-x-2 mb-2">
                    <div class="flex lg:flex-col mb-2 space-y-2  " >
                        <label for="tk_tanggal_sewa">Tanggal Mulai</label>
                        <input id="tk_tanggal_sewa" name="tk_tanggal_sewa" type="date" class="shadow-md border border-plaster">
                    </div>
                    <div class="flex lg:flex-col mb-2 space-y-2 rounded-md">
                        <label for="tk_tanggal_kembali">Tanggal Kembali</label>
                        <input id="tk_tanggal_kembali" name="tk_tanggal_kembali" type="date" class="shadow-md border border-plaster">
                    </div>
                    <div class="flex lg:flex-col ">
                        <label for="tk_durasi" >Durasi</label><br>
                        <input  placeholder="1 hari" id="tk_durasi" name="tk_durasi" class="shadow-md border border-plaster">
                    </div>
                </div>
                <hr class="">
            <!--</div>-->
            <!--<div class="container bg-white mt-2 rounded-md"> -->
            <div class="relative py-2 ">
                <button class="  h-7 w-32 bg-primary rounded-lg hover:opacity-50  absolute right-0 "> <a href="">Tambah Item</a></button>
            </div>
            <div class=" flex py-6">
                <img src="{{asset('img/transportasi/bus.jpg')}}" alt="gambar item yang akan disewa" class="xl:1/3 2xl:1/3 md:1/3 lg:w-1/3 w-full">
                
                <div class=>
                    <p class="font-bold indent-2">Nama Merk</p>
                    <p class=" indent-2">Nama Seri</p>
                </div>
            </div>
            </div>
            <div class=" container bg-white  mt-1 py-6 rounded-md">
                <label for="voucher">Kode Voucher</label>
                <br><input id="voucher" placeholder="2023VOUCHER" type="text" class="shadow-md border-gray-100">
                <div class="mb-2 ">
                    <br><label for="metode_bayar">Tipe Pembayaran</label><br>
                    <select name="metode_bayar" id="metode_bayar" class="shadow-md border-gray-100">
                        <option value="transfer">DP</option>
                        <option value="transfer">Lunas</option>
                    </select>
                </div>
            
                
            <h4 class="font-semibold mb-2">Rincian Harga</h4>
            <div class="flex justify-between">
                <p>Harga item</p>
                <p>Rp</p>
                
            </div>
            <p class="text-xs text-gray-300">(1x) Bus dengan sopir 24 jam</p>
            <div class="flex justify-between mb-2 mt-2">
                <p>Voucher</p>
                <p>Rp 0</p>
            </div>
            <hr>
            <div class="flex justify-between mb-2 mt-2">
                <h4 class="font-semibold">Harga Total</h4>
                <!-- harga total = harga_item - harga_promo  -->
                <p>Rp 2.000.000</p>
            </div>
            <button type="submit" class="mt-5 h-7 w-full bg-primary rounded-lg hover:opacity-50  text-sm   text-white">
                Lanjutkan Pembayaran
            </button>
        </form>
    </div>
</div>
</div>
</div>
@endsection