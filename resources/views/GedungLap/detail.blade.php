@extends('layouts-home.master')
@section('content')
    <div class="bg-plaster py-24 ">
        <div class="container">

            <x-layout-detail-transaksi class="mb-4 text-xl font-bold">
                <a class="text-primary hover:font-bold hover:underline" href="{{ route('gedung.index') }}">{{ $title }}
                </a>
                / {{ $gedung_lap->gl_nama }}</h2>
            </x-layout-detail-transaksi>
            {{-- Gambar Baru --}}

            <div class="flex xl:flex-row md:flex-row lg:flex-row flex-col justify-center space-x-2">

                <x-layout-detail-transaksi
                    class="flex xl:flex-row w-full md:items-end md:flex-row lg:flex-row flex-col-reverse justify-center gap-5 space-x-2">

                    <x-multiple-image>
                        <x-sub-multiple-image src="{{ $gedung_lap->gl_foto }}" />
                        @foreach ($gedung_lap->detailFotoGedungLap as $image)
                            <x-sub-multiple-image src="{{ $image->dfgl_foto }}" />
                        @endforeach
                    </x-multiple-image>


                    <div class="basis-3/5 h-full flex flex-row gap-4 rounded-md p-4 mb-2 ml-2 ">
                        <div class="flex-col space-y-2 w-full">
                            <p class="font-bold text-4xl"> {{ $gedung_lap->gl_nama }}</p>
                            <p class="text-primary font-bold text-2xl">Rp.
                                {{ number_format($gedung_lap->gl_tarif, 0, ',', '.') }}

                            <div class=" bg-white p-3 rounded-md">
                                <ul class="text-gray-500 text-sm ">
                                    <div class="flex mb-2">
                                        <p class="text-sm font-semibold ml-2">{{ $gedung_lap->gl_ukuran_gedung }}</p>
                                        <sup class="text-xs text-gray-500">Ukuran</sup>
                                    </div>
                                    <div class="flex mb-2">
                                        <p class="text-sm font-semibold ml-1">{{ $gedung_lap->gl_kapasitas_gedung }}</p>
                                        <p class="text-xs text-gray-500 ml-1">Kapasitas</sup>
                                    </div>

                                </ul>
                            </div>
                            <div class=" bg-white p-3 rounded-md">
                                </p>
                                <button id="pesan"
                                    class="block text-center text-white p-2 text-sm mt-4 h-10 w-full bg-primary rounded-lg hover:opacity-50">Pesan</button>
                            </div>
                        </div>
                    </div>
                </x-layout-detail-transaksi>
            </div>

            <x-layout-detail-transaksi class="mt-5 hidden" :isId="true" id="dropdown">
                <h4 id="dropdown-title" class="font-bold mb-4 uppercase"></h4>
                <form action="{{ route('gedung.pesan.action') }}" method="POST" id="form_asrama">
                    @csrf
                    @method('POST')
                    <div
                        class=" flex flex-col xl:flex-row md:flex-row lg:flex-row xl:space-x-2 md:space-x-2 sm:space-x-2 mb-2">
                        <div class=" mb-2 space-y-2  ">
                            <label for="tg_tanggal_pelaksanaan"
                                class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Pelaksanaan</label>
                            <input id="tg_tanggal_pelaksanaan" name="tg_tanggal_pelaksanaan" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <p class="text-red-500 text-sm hidden" id="tg_tanggal_pelaksanaan_error"></p>
                        </div>
                        <div class=" mb-2 space-y-2">
                            <label for="promo"
                                class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Voucher</label>
                            <input id="promo" name="promo" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <p class="text-red-500 text-sm hidden" id="promo_error"></p>
                        </div>
                    </div>

                    <div class=" mb-2 space-y-2">
                        <label for="satuan"
                            class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                        <select id="satuan" name="satuan" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>-- PILIH SATUAN --</option>
                            @foreach ($gedungSplit as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-500 text-sm hidden" id="satuan_error"></p>
                    </div>

                    <div id="durasi_time" class="hidden">
                        <div
                            class="flex flex-col xl:flex-row md:flex-row lg:flex-row xl:space-x-2 md:space-x-2 sm:space-x-2 mb-2">
                            <div class=" mb-2 space-y-2  ">
                                <label for="tg_jam_mulai"
                                    class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                <input id="tg_jam_mulai" name="tg_jam_mulai" type="time"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <p class="text-red-500 text-sm hidden" id="tg_jam_mulai_error"></p>
                            </div>
                            <div class=" mb-2 space-y-2  ">
                                <label for="tg_jam_akhir"
                                    class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Akhir</label>
                                <input id="tg_jam_akhir" name="tg_jam_akhir" type="time"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <p class="text-red-500 text-sm hidden" id="tg_jam_akhir_error"></p>
                            </div>
                        </div>
                    </div>

                    <div class=" mb-2 space-y-2 hidden" id="tanggal_kembali">
                        <label for="tg_durasi"
                            class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi</label>
                        <input id="tg_durasi" name="tg_durasi" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <p class="text-red-500 text-sm hidden" id="tg_durasi_error"></p>
                    </div>

                    <div class=" mb-2 space-y-2">
                        <label for="tg_tujuan"
                            class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                        <input id="tg_tujuan" name="tg_tujuan" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <p class="text-red-500 text-sm hidden" id="tg_tujuan_error"></p>
                    </div>
                    <ul id="card" class="list-disc">
                    </ul>
                    <button type="submit" id="submit-dropdown"
                        class="mt-5 h-7 w-full bg-primary rounded-lg hover:opacity-50  text-sm   text-white">
                        Pesan
                    </button>
                </form>
            </x-layout-detail-transaksi>

            <x-layout-detail-transaksi class="mt-5">
                <div class="mt-4 font">
                    <p class="text-base font-bold">Tentang {{ $gedung_lap->gl_nama }}</p>
                    <div class="mt-5 mb-5">
                        {!! $gedung_lap->gl_keterangan !!}
                    </div>
                    <p class="text-base font-bold">Gratis Penjemputan</p>
                    <p class="text-sm text-gray-400 p-2 overflow-hidden">Info lebih lanjut hubungi kontak
                        WhatsApp di bawah ini : </p>
                    <div class="flex  p-2 w-30">
                        <a aria-label="Chat on WhatsApp"
                            href="https://wa.me/6289529811097/?text=Hello Saya Ingin bertanya">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z">
                                </path>
                            </svg>
                        </a>
                        <p class="text-sm">+62 896578110 (Dodo)</p>
                    </div>
                </div>
            </x-layout-detail-transaksi>

            <livewire:ulasan master="gedung_laps" rating="rating_gedung_laps"
                slug="{{ explode('/', url()->current())[count(explode('/', url()->current())) - 1] }}"
                slugColumn="gl_slug" />
        </div>
    </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/feature/multiple-images.js') }}"></script>
    <script src="{{ asset('js/validasi/gedungLap.js') }}"></script>
@endsection
