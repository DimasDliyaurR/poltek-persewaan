@extends('layouts-home.navbar.nav-transaksi')
@section('content')
    <div class="w-full pb-36 pt-36 flex flex-wrap justify-center  xl:mx-auto">
        <div class="container sm:grid-cols-2  lg:grid-cols-3 xl:gap-36 gap-6 md:gap-1">
            <div class="bg-white col-span-2  shadow-md p-4 w-full h-auto xl:ml-36  mx-auto rounded-md ">
                <div class="relative">
                    <h4 class="font-semibold mb-6">Pemesanan Transportasi</h4>
                    {{-- Form START --}}
                    <div>
                        <form class="p-2 mx-auto" action="{{ route('transportasi.pesan') }}" method="POST">
                            @csrf
                            <div class="grid md:grid-cols-2 md:gap-6">

                                {{-- Tanggal Sewa --}}
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="date" name="tk_tanggal_sewa" id="tk_tanggal_sewa"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="tk_tanggal_sewa"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                                        Sewa</label>
                                    @error('tk_tanggal_sewa')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="date" name="tk_tanggal_kembali" id="tk_tanggal_kembali"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="tk_tanggal_kembali"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                                        Kembali</label>
                                </div>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="tk_durasi" id="tk_durasi"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="tk_durasi"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                                    Kembali</label>
                            </div>

                            {{-- Button --}}
                            <div class="flex md:flex-row flex-col-reverse justify-between md:items-center">
                                <p class="text-sm">List Item yang akan dibeli</p>
                                <button id="add-item"
                                    class="text-white bg-primary hover:bg-orange-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    type="button" data-drawer-target="drawer-bottom-example"
                                    data-drawer-show="drawer-bottom-example" data-model-togel="drawer-bottom-example"
                                    data-drawer-placement="bottom" aria-controls="drawer-bottom-example"
                                    data-drawer-backdrop="false">
                                    Tambah Item
                                </button>
                            </div>

                            {{-- Card Container --}}
                            <div id="input-slug" class="h-1">
                                <input type="text" name="slug[]" value="{{ $item->mk_slug }}" id="slug">
                                <input type="text" name="slug[]" value="bus-mini" id="slug">
                            </div>
                            <div id="card" class="w-full h-auto flex flex-col gap-5 items-center p-4 mb-4">
                                {{-- Card Start --}}
                                <div class="flex flex-row border-t p-2">

                                    {{-- Image Card --}}

                                    {{-- Card End --}}
                                </div>

                            </div>

                            <button type="submit"
                                class="text-white bg-primary hover:bg-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <div class="text-center">
                        </form>
                    </div>
                    {{-- Form END --}}


                    <!-- drawer component -->
                    <div id="drawer-bottom-example"
                        class="hidden fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none"
                        tabindex="-1" aria-labelledby="drawer-bottom-label">
                        <h5 id="drawer-bottom-label"
                            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>All Items
                        </h5>
                        <button type="button" data-drawer-hide="drawer-bottom-example"
                            aria-controls="drawer-bottom-example"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close menu</span>
                        </button>
                        {{-- Containt Drawer --}}


                        <div class="flex md:flex-row md:flex-wrap flex-col gap-4 p-5 overflow-y-scroll w-screen h-96">

                            @foreach ($merkKendaraan as $item)
                                <div class="flex flex-row">
                                    <img class="h-40 max-w-full rounded-l-md object-cover w-40"
                                        src="{{ Storage::url($item->mk_foto) }}" alt="">
                                    <div class="flex flex-col h-40 bg-white shadow-sm shadow-gray-300 p-4 justify-between">
                                        <p class="font-bold text-xl">{{ $item->mk_merk }}</p>
                                        <p class="text-md">Rp {{ number_format($item->mk_tarif, 0, ',', '.') }}</p>

                                        <div class="flex flex-row gap-1">


                                            <button id="add" onclick="add(this)"
                                                class="text-white bg-primary w-20 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm text-center"
                                                type="button">
                                                <input class="sr-only" value="{{ $item->mk_slug }}">
                                                Add
                                            </button>

                                            {{-- Button Detail --}}
                                            <button data-modal-target="box-{{ $item->id }}"
                                                data-modal-toggle="box-{{ $item->id }}"
                                                class="text-white bg-primary w-20 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm text-center"
                                                type="button">
                                                Detail
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    @foreach ($merkKendaraan as $item)
                        <!-- Main modal -->
                        <div id="box-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            {{ $item->mk_merk }}
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="box-{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-lg font-bold text-right">Rp.
                                            {{ number_format($item->mk_tarif, 0, ',', '.') }}</p>

                                        <div class="flex flex-row gap-5">

                                            <div class="flex flex-row gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 15 15">
                                                    <path fill="currentColor"
                                                        d="M14 6v5.5a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 0 11.5 8H10V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9h1.5a.5.5 0 0 1 .5.5v2a1.5 1.5 0 0 0 3 0V5a1 1 0 0 0-1-1V2.49a.5.5 0 0 0-.5-.49a.51.51 0 0 0-.5.55V5a1 1 0 1 0 1-1zm-5 .5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5z" />
                                                </svg>
                                                {{ $item->mk_bahan_bakar }}
                                            </div>

                                            <div class="flex flex-row gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 256 256">
                                                    <path fill="currentColor"
                                                        d="M248 128a8 8 0 0 1-8 8h-16.67A48.08 48.08 0 0 1 176 176h-40v24h24a32 32 0 0 1 32 32a8 8 0 0 1-16 0a16 16 0 0 0-16-16h-24v16a8 8 0 0 1-16 0v-16H96a16 16 0 0 0-16 16a8 8 0 0 1-16 0a32 32 0 0 1 32-32h24v-24H80a48.08 48.08 0 0 1-47.33-40H16a8 8 0 0 1 0-16h24a8 8 0 0 1 8 8a32 32 0 0 0 32 32h96a32 32 0 0 0 32-32a8 8 0 0 1 8-8h24a8 8 0 0 1 8 8M80 144h96a16 16 0 0 0 15.84-18.26l-13.72-96A16.08 16.08 0 0 0 162.28 16H93.72a16.08 16.08 0 0 0-15.84 13.74l-13.72 96A16 16 0 0 0 80 144" />
                                                </svg>
                                                {{ $item->mk_kapasitas }}
                                            </div>

                                        </div>

                                        <div class="flex flex-row gap-1">
                                            Unit yang tersedia :
                                            {{ $item->kendaraans_count }}
                                        </div>

                                        <p>
                                            {!! $item->mk_deskripsi !!}
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="box-{{ $item->id }}" type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                            accept</button>
                                        <button data-modal-hide="box-{{ $item->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- ... -->
                    {{-- <div class=" grid md:grid-rows-2 md:grid-flow-col  xl:gap-3 gap-1 xl:w-56 p-4   md:gap-52 w-full  ">
                    <div class="bg-white w-56 relative -mt-4 p-3  pb-2 rounded-md">
                        <h4 class="font-semibold mb-2">Executive Bus</h4>
                        <img src="{{ 'img/transportasi/bus.jpg' }}" alt="">
                        <div class="flex gap-2 w-14 mt-2">
                            <img src="{{ 'img/transportasi/bus.jpg' }}" alt="">
                            <img src="{{ 'img/transportasi/bus.jpg' }}" alt="">
                        </div>
                        <p class="text-base mt-2 mb-2 font-semibold">Rp 2.000.000</p>
                        <div class="flex mb-2">
                            <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm font-semibold ml-1">45</p>
                            <sup class="text-xs text-gray-500"> Kapasitas </sup>
                        </div>
                        <div class="flex mb-2">
                            <img src="{{ 'img/transportasi/bensin.png' }}" alt="bbm" class="w-5 h-5">
                            <p class="text-sm font-semibold ml-2">Bensin</p>
                            <sup class="text-xs text-gray-500"> Fuel </sup>
                        </div>
                        <div class="flex mb-2">
                            <img src="{{ 'img/transportasi/oli.png' }}" alt="bbm" class="w-5 h-5">
                            <p class="text-sm font-semibold ml-2">Oil</p>
                            <sup class="text-xs text-gray-500"> Fuel </sup>
                        </div>
                    </div>
                    <div class=" top-12 bg-white h-36 w-56 bottom-0  gap-1 p-3 rounded-md xl:mr-20">
                        <h4 class="font-semibold mb-3">Informasi</h4>
                        <p class="text-xs text-gray-400 mb-2"> * untuk survey dan pertanyaan lainnya bisa menghubungi
                            whatsapp berikut.</p>
                        <div class="flex hover:bg-primary hover:text-white">
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
                </div> --}}
                </div>
            </div>

            {{-- Scroll Bar END --}}

            {{-- Script --}}
        @endsection
        @section('script')
            <script type="text/javascript" src="{{ asset('js/feature/list-kendaraan.js') }}"></script>
        @endsection
