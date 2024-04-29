@extends('layouts-home.navbar.nav-old')
@section('content')
    <!-- Hero Section Start -->
    <section id="home" class="pt-36 pb-64 h-2/5 relative  ">
        <!-- <div class="absolute inset-0 bg-white opacity-10 "> -->
        <div class="absolute inset-0 bg-white  opacity-10 ">
            <div class=" h-full  bg-cover " style="background-image: url('{{ asset('img/gerbang.jpg') }}');">
                <div class="relative opacity-10 w-1/2"></div>
            </div>
        </div>
        <div class="container relative z-10 pb-56 flex flex-wrap mt-20">
            <!-- <div class="w-full self-end px-4  ">
          <!-- <div class="relative mt-10  pb-3 lg:mt-9 lg:right-0">
            <img src="{{ asset('img/LogoPoltekbang.png') }}" alt="Logo Poltekbang" class="max-w-full mx-auto w-96 h-64" />
          </div> -->
            <!-- </div>  -->
            <!-- <div class="w-full text-center px-4 ">
          <h1 class="block font-bold text-slate-900 text-4xl lg:text-5xl pt-10 pb-2">SEWA ASET </h1>
            <h2 class="font-semibold md:text-xl lg:text-2xl mt-6 leading relaxed mb-8 ">Mudah, Aman , Terjangkau !</h2>
        </div> -->
            <!-- new -->
            <div class="w-full  self-center px-10  xl:w-1/2 lg:w-1/2 ">
                <h1 class="text-base text-grecianblue font-semibold  md:text-xl lg:text-2xl">Ayoo <span
                        class="text-black block font-bold text-slate-900 text-4xl lg:text-5xl pb-2">SEWA ASET </span></h1>
                <h2
                    class="flex justify-center xl:justify-start font-semibold md:text-xl lg:text-2xl mt-6 leading relaxed mb-8  ">
                    Mudah, Aman , Terjangkau !</h2>
                <div id="buttondropdown" class="mx-auto flex">
                    <div id="dropdownKategori" class="relative">
                        <div
                            class="border-solid text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex justify-between bg-white shadow-sm ">
                            <a href="#kat">Booking dari sekarang ! | Kategori </a>
                        </div>
                    </div>
                    <div id="dropdownJadwal" class="relative">
                        <div onclick="toggleDropdown2()"
                            class="border-solid w-28 text-sm border-gray-400 border-[1px] px-5 py-2 rounded cursor-pointer  flex  bg-white shadow-sm items-center">
                            <a href="/kalender">Jadwal</a>
                            <svg class=" pl-2 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div id="dropdownKal"
                            class="rounded border-[2px] border-white bg-white p-2 absolute top-[50px] w-[185px]  shadow-md hidden">
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                                <a href="">
                                    <p>Kalender Transportasi</p>
                                </a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                                <a href="">
                                    <p>Kalender Gedung</p>
                                </a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                                <a href="">
                                    <p>Kalender Layanan</p>
                                </a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                                <a href="">
                                    <p>Kalender Asrama</p>
                                </a>
                            </div>
                            <div class="cursor-pointer hover:bg-gray-300 p-1 rounded text-sm">
                                <a href="/kalender">
                                    <p>Kalender Alat Barang</p>
                                </a>
                            </div>
                        </div>
                        <script>
                            function toggleDropdown2() {
                                let dropdownKal = document.querySelector('#dropdownJadwal #dropdownKal');
                                dropdownKal.classList.toggle("hidden");
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="container w-full xl:w-1/2 self-end ">
                <img src="{{ asset('img/landingpage/lp.png') }}" alt="Logo Poltekbang" class="w-3xl h-full mx-auto" />
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <div id="kat" class=" relative bg-white rounded-lg flex  flex-wrap xl:w-3/5 mx-auto xl:shadow-lg  -mt-20">
        <div
            class="xl:w-1/5 md:w-1/3 w-1/2 shadow-lg xl:shadow-none  h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer flex justify-center items-center ">
            <a href="">Transportasi
                <svg version="1.1" class="hover:text-white  mt-6 h-16 w-16 mx-auto" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                    <path fill="#FB761C" opacity="1.000000" stroke="none" d="
              M233.826340,472.811523
                C221.843140,471.198700 209.774780,470.049652 197.895813,467.869049
                C177.939133,464.205566 158.945511,457.436371 141.001831,447.935913
                C125.249313,439.595612 110.387283,430.059021 96.634926,418.473755
                C80.717842,405.064789 66.714195,390.113190 54.865467,373.175903
                C49.111057,364.950195 43.958847,356.135925 39.773220,347.019196
                C33.493961,333.342346 27.380035,319.451202 22.941399,305.110931
                C19.308958,293.375275 17.596666,280.922821 16.187456,268.655548
                C14.739185,256.048218 13.944324,243.264191 14.215192,230.586380
                C14.564760,214.225067 17.201099,198.118271 21.234589,182.118546
                C25.848509,163.816452 33.001152,146.555099 41.351395,129.912415
                C47.135517,118.384224 55.574490,108.160774 63.088940,97.539505
                C66.855286,92.215973 70.903183,87.020065 75.372017,82.283730
                C80.621254,76.720276 86.341362,71.577103 92.090919,66.517159
                C96.806297,62.367348 101.644264,58.285557 106.818352,54.744049
                C115.814781,48.586239 124.869545,42.440838 134.338654,37.062870
                C149.919601,28.213705 166.418671,21.324024 183.772308,16.717443
                C193.006226,14.266273 202.303131,11.931046 211.697495,10.244914
                C218.938828,8.945211 226.381119,8.133458 233.725601,8.190727
                C244.309753,8.273259 254.885620,9.855805 265.466064,9.867680
                C281.755096,9.885961 297.297241,13.782382 312.710876,18.152584
                C322.342987,20.883564 331.775055,24.560541 340.956116,28.589537
                C357.684418,35.930511 373.580994,44.879322 387.807007,56.433861
                C396.273346,63.310341 404.726837,70.321373 412.346130,78.095184
                C424.776276,90.777374 436.277832,104.339516 444.962036,119.980698
                C450.229614,129.468216 455.885345,138.833344 460.108246,148.787338
                C467.652863,166.571228 473.649048,184.938904 475.976074,204.263947
                C477.133148,213.873230 478.571686,223.502518 478.835297,233.151382
                C479.143005,244.412949 479.121399,255.805893 477.749878,266.958252
                C476.223206,279.371796 473.907562,291.847168 470.307312,303.805450
                C466.104034,317.766754 460.697418,331.446838 454.746063,344.772491
                C450.730896,353.762787 445.621002,362.499390 439.666382,370.335419
                C429.671234,383.488617 419.295593,396.495270 407.818451,408.341278
                C395.213318,421.351501 380.302917,431.765228 364.698547,441.130585
                C345.287109,452.780884 324.454865,460.961639 302.645874,466.460907
                C291.600464,469.246063 280.093445,470.202454 268.793152,471.973083
                C266.542877,472.325653 264.283630,472.621246 261.288452,472.579834
                C255.483887,472.153381 250.417236,471.973480 245.355530,472.065216
                C241.509216,472.134888 237.669174,472.550079 233.826340,472.811523
              M229.660385,34.676655
                C213.165497,35.134644 197.268524,38.911091 181.750504,44.090275
                C173.178955,46.951050 164.763580,50.578190 156.765198,54.786270
                C145.431747,60.748993 133.741943,66.522591 123.681503,74.290092
                C111.773056,83.484390 101.048073,94.336807 90.522697,105.163284
                C79.112885,116.899513 70.371399,130.692154 62.917461,145.272232
                C50.993111,168.596558 43.118652,193.020477 40.792065,219.314102
                C39.103256,238.399979 39.394772,257.427399 42.340076,276.168945
                C45.720654,297.680206 52.744141,318.385712 63.372612,337.487793
                C69.440903,348.394043 77.168213,358.368988 83.989609,368.866547
                C92.103607,381.353302 103.198875,391.063751 114.314362,400.549194
                C126.032524,410.548920 139.128357,418.645752 152.942581,425.751862
                C165.651352,432.289337 178.814590,437.284821 192.489731,440.916687
                C207.363251,444.866821 222.451950,448.153534 237.981735,447.970428
                C247.744781,447.855347 257.575134,447.871338 267.241913,446.714294
                C277.219055,445.520111 287.099579,443.251343 296.900543,440.936798
                C304.901398,439.047272 312.890045,436.848938 320.589935,433.994141
                C338.263245,427.441559 354.598480,418.215515 369.467682,406.692047
                C378.658783,399.569000 387.773834,392.077972 395.613861,383.548767
                C405.716309,372.558258 415.023804,360.890625 422.938416,347.956482
                C431.679901,333.671143 438.906433,318.800323 443.731628,303.012268
                C450.574799,280.621368 454.577118,257.714447 453.277710,233.932312
                C452.421387,218.259491 450.126251,202.948288 446.335052,187.862778
                C440.471741,164.531876 430.275665,143.042435 416.693481,123.204643
                C403.797302,104.368858 388.129120,87.982246 369.793121,74.542427
                C349.393860,59.590313 327.055206,48.314865 302.409912,41.463970
                C287.457886,37.307602 272.333618,35.425976 256.440369,33.236309
                C247.648209,33.461273 238.856033,33.686241 229.660385,34.676655
              z" />
                    <path fill="#F87821" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M426.423950,45.770847
                C440.974670,58.503525 452.762634,73.177597 464.061554,88.295807
                C460.503204,90.822571 457.082092,92.820190 454.209717,95.423309
                C451.756470,97.646538 450.242065,97.057434 448.497864,94.890717
                C441.684204,86.426544 435.548187,77.270920 427.858765,69.692970
                C417.190552,59.179382 405.632019,49.502224 393.911774,40.147144
                C386.338135,34.101860 377.785522,29.284882 369.693542,23.884607
                C368.746277,23.252439 367.938751,22.410955 367.133545,21.723759
                C369.193787,17.968975 371.140198,14.577422 372.929932,11.105105
                C374.118378,8.799418 375.275818,8.653998 377.575562,9.999601
                C391.384338,18.079218 404.687561,26.856524 416.797302,37.356689
                C419.927094,40.070511 422.998566,42.851593 426.423950,45.770847
              z" />
                    <path fill="#F87821" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M109.946655,448.977570
                C113.374039,451.275787 116.366684,453.630615 119.475014,455.821320
                C121.287941,457.099030 123.285912,458.114197 125.313904,459.314514
                C123.944145,462.153748 122.907188,464.518768 121.681328,466.781494
                C120.527191,468.911774 119.173912,470.934174 117.175919,474.201630
                C104.508530,465.106537 92.166199,456.530487 80.156662,447.511292
                C73.310226,442.369598 66.631081,436.884186 60.556252,430.867340
                C53.319180,423.699341 46.719639,415.875031 40.024403,408.178040
                C36.715378,404.373932 34.022099,400.027435 30.649105,396.288147
                C28.468870,393.871216 28.633463,392.574310 31.368910,391.118866
                C32.654007,390.435150 33.803341,389.472778 34.950100,388.556458
                C40.992649,383.728027 43.313393,384.563538 47.660648,391.066986
                C56.025948,403.581421 66.074379,414.671600 77.764381,424.251892
                C84.680603,429.919922 91.251266,436.012787 98.223045,441.608459
                C101.718620,444.414032 105.763855,446.534790 109.946655,448.977570
              z" />
                    <path fill="#F57B29" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M21.822670,355.634888
                C23.273113,355.962036 24.925207,356.283234 25.601360,357.271881
                C27.506319,360.057251 28.646856,363.417236 30.770912,365.986816
                C33.043030,368.735504 31.661922,370.217773 29.687555,371.645966
                C28.262783,372.676575 26.468861,373.179108 24.924498,374.065186
                C18.697033,377.638062 18.680422,377.676605 14.865259,371.348175
                C13.044457,368.327911 11.356703,365.227448 9.615921,362.175995
                C13.925508,359.927216 17.752150,357.930420 21.822670,355.634888
              z" />
                    <path fill="#F47A28" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M477.533081,122.768929
                C474.297760,123.873940 470.906158,126.194000 468.653137,125.376427
                C466.350464,124.540840 465.120880,120.654327 463.504181,118.052040
                C462.229370,116.000130 461.080017,113.870308 459.843567,111.720619
                C463.664062,109.615860 467.206421,107.606796 470.804779,105.703636
                C472.950409,104.568840 474.697052,104.548256 476.060364,107.192177
                C478.057404,111.065086 480.446320,114.735931 482.895325,118.876907
                C481.237335,120.109100 479.556976,121.357925 477.533081,122.768929
              z" />
                    <path fill="#FEB47F" class="hover:fill-white"s opacity="1.000000" stroke="none" d="
              M234.304718,472.904327
                C237.669174,472.550079 241.509216,472.134888 245.355530,472.065216
                C250.417236,471.973480 255.483887,472.153381 260.869629,472.513977
                C252.388290,472.873352 243.585693,472.935242 234.304718,472.904327
              z" />

                    <path fill="#FAC39E" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M256.751221,33.526104
                C248.370209,33.836216 239.678329,33.856533 230.525146,33.894028
                C238.856033,33.686241 247.648209,33.461273 256.751221,33.526104
              z" />
                    <path fill="#FD751A" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M290.185364,184.477570
                C297.187561,185.162918 303.844513,186.041489 310.490173,186.998291
                C320.214783,188.398392 330.002533,189.491852 339.632446,191.382812
                C350.589233,193.534332 361.549530,195.925293 372.238251,199.116608
                C384.299622,202.717758 396.212494,206.945267 407.902283,211.619797
                C416.757843,215.160950 425.256287,219.650162 433.728668,224.071930
                C438.133942,226.371063 437.726929,231.481232 437.747101,235.271927
                C437.794159,244.132904 436.706299,253.001251 436.043671,261.864044
                C435.725189,266.123383 435.451935,270.392029 434.931427,274.628601
                C434.450775,278.540894 433.350220,280.556702 428.176178,279.352051
                C419.923553,277.430603 411.315308,277.043396 402.860779,275.980713
                C389.864990,274.347229 376.845703,272.872192 363.886658,270.984680
                C354.316010,269.590637 344.936127,270.396759 335.550385,272.185059
                C318.646759,275.405701 304.341614,283.565521 292.654388,295.953247
                C282.080139,307.161255 274.499359,320.375610 272.145233,335.748199
                C270.332642,347.584534 269.785126,359.631348 269.012848,371.606354
                C267.843536,389.738647 266.994415,407.891479 265.920044,426.030273
                C265.827606,427.591309 265.069153,429.112946 264.525726,430.976349
                C253.476929,430.976349 242.474915,431.071472 231.479950,430.836792
                C230.313309,430.811920 228.328659,428.959564 228.182877,427.775330
                C227.239761,420.113770 226.533890,412.412476 226.068237,404.704987
                C225.261353,391.349274 225.024231,377.951599 223.923447,364.623138
                C222.663376,349.366089 222.843506,333.716125 215.911423,319.526855
                C210.822342,309.110016 204.651276,299.525177 195.611649,291.672607
                C187.289474,284.443237 178.355194,278.540466 168.079712,275.134338
                C155.003174,270.799652 141.678131,268.020355 127.623749,271.481262
                C120.521721,273.230164 112.959702,273.035095 105.644691,274.011444
                C91.873466,275.849548 78.133881,277.923584 64.372993,279.841156
                C61.623230,280.224365 59.644108,280.270294 58.798885,276.285400
                C55.665459,261.512421 54.838032,246.618256 55.037891,231.599945
                C55.091606,227.563614 57.182976,224.921799 60.596214,223.188446
                C75.178848,215.782883 89.441330,207.752853 105.533592,203.680099
                C119.667824,200.102890 133.480713,195.210297 147.672119,191.918747
                C159.452988,189.186295 171.547409,187.707916 183.560349,186.104065
                C193.635559,184.758926 203.774353,183.614670 213.920242,183.148926
                C224.936325,182.643265 235.995163,182.889694 247.031631,183.056107
                C258.722473,183.232376 270.409790,183.674591 282.096619,184.060806
                C284.680389,184.146194 287.255768,184.484116 290.185364,184.477570
              M227.760712,277.984344
                C235.846909,281.952362 244.728806,283.323029 253.193680,281.641510
                C262.898712,279.713684 271.271942,274.521240 278.085907,266.618561
                C289.963013,252.843826 289.230865,229.083572 279.451263,216.550278
                C265.756165,198.998978 243.923279,193.477890 224.402557,206.176987
                C210.593155,215.160629 203.573944,228.391251 205.888199,245.705505
                C207.791595,259.945953 214.765961,270.469604 227.760712,277.984344
              M174.508453,249.024734
                C177.825775,249.023163 181.179138,249.301498 184.442596,248.881424
                C185.737228,248.714798 187.748047,247.086700 187.855469,245.971985
                C188.260956,241.764603 188.018356,237.494781 188.018356,233.285675
                C179.673660,233.285675 171.971771,233.285675 164.303818,233.285675
                C164.303818,238.660172 164.303818,243.704041 164.303818,249.025894
                C167.597656,249.025894 170.561188,249.025894 174.508453,249.024734
              M325.326508,232.967972
                C318.583679,232.967972 311.840851,232.967972 305.246826,232.967972
                C305.246826,238.725937 305.246826,243.668915 305.246826,249.022461
                C311.956329,249.022461 318.419708,249.175507 324.864990,248.902206
                C326.270447,248.842636 328.674133,247.382462 328.793549,246.355270
                C329.251740,242.412827 329.064697,238.378708 328.842468,234.394196
                C328.813446,233.873825 327.180725,233.442886 325.326508,232.967972
              z" />
                    <path fill="#F9771F" class="hover:fill-white" opacity="1.000000" stroke="none" d="
              M258.784546,218.943985
                C267.270264,224.636917 272.388916,232.251465 271.805969,242.218018
                C271.303040,250.816742 267.481842,257.985107 259.282501,262.418243
                C250.810349,266.998871 242.611130,267.429321 234.182861,262.689453
                C217.479797,253.295975 217.093353,230.852325 231.514069,220.150955
                C238.391556,215.047272 246.373383,215.082809 254.385254,217.240997
                C255.771317,217.614380 257.068329,218.318390 258.784546,218.943985
              M253.539642,232.275116
                C248.700470,232.519104 243.861313,232.763107 238.284317,233.447571
                C238.152451,237.404251 237.735626,241.383713 238.048965,245.304825
                C238.153427,246.612167 240.275162,248.922256 241.221893,248.800949
                C245.815338,248.212372 252.167191,251.911423 254.609131,246.734512
                C256.336456,243.072556 254.321808,237.645508 253.539642,232.275116
              z
              M253.977600,233.006409
                C254.321808,237.645508 256.336456,243.072556 254.609131,246.734512
                C252.167191,251.911423 245.815338,248.212372 241.221893,248.800949
                C240.275162,248.922256 238.153427,246.612167 238.048965,245.304825
                C237.735626,241.383713 238.152451,237.404251 238.662094,233.242096
                C239.039871,233.036621 239.062637,233.062607 239.037018,233.525360
                C239.011398,238.580963 239.011398,243.173813 239.011398,247.726471
                C244.291000,247.726471 249.015396,247.726471 253.936096,247.726471
                C253.936096,242.650604 253.936096,237.857254 253.947754,233.050430
                C253.959427,233.036957 253.977600,233.006409 253.977600,233.006409
              z
              M239.031006,233.021851
                C243.861313,232.763107 248.700470,232.519104 253.758621,232.640762
                C253.977600,233.006409 253.959427,233.036957 253.486816,233.021698
                C248.363693,233.025177 243.713165,233.043884 239.062637,233.062607
                C239.062637,233.062607 239.039871,233.036621 239.031006,233.021851
              z" />

                </svg>
            </a>
        </div>
        <div
            class="xl:w-1/5  md:w-1/3 w-1/2 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer  flex justify-center items-center">
            <a href="/gedung">Gedung
                <img src="{{ asset('img/kategori/gedung.png') }}" alt=""
                    class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
            </a>
        </div>
        <div
            class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer flex justify-center items-center">
            <a href="/layanan">Layanan
                <img src="{{ 'img/kategori/layanan.png' }}" alt=""
                    class=" mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
            </a>
        </div>
        <div
            class="xl:w-1/5 w-1/2  md:w-1/3  shadow-lg xl:shadow-none h-40   hover:bg-gray-300 rounded-lg p-4 cursor-pointer flex justify-center items-center">
            <a href="/asrama"><span class="mb-8">Asrama</span>
                <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                    class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
            </a>
        </div>
        <div
            class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none  h-40 hover:bg-gray-300 rounded-lg p-4 cursor-pointer sm:mx-auto mx-auto xs:mx-auto flex justify-center items-center">
            <a href="/alatbarang">Alat Barang
            </a>
        </div>
    </div>
    <!-- kategori section -->
    <section id="kategori" class="pt-36 pb-36 bg-white ">

        <div class="container  ">
            <div class="w-full ">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                    <h2 class="font-bold text-black text-3xl mb-4 sm:text-2xl lg:text-xl">Home > Kategori</h2>
                </div>
            </div>
            <!-- <div class="flex flex-wrap xl:w-11/12 mx-auto">
          <div class="w-full px-4 sm:w-1/2 lg:w-1/2 xl:w-1/3 mb-3">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden ">
              <div class="py-8 px-6">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                  <div class="relative h-56 overflow-hidden rounded-md ">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                      <img src="{{ asset('img/transportasi/bus.JPG') }}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/transportasi/bus_depan.JPG') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/transportasi/bus_kiri.JPG') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/transportasi/bus_kanan.JPG') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                    </div>
                  </div>
                  <div class="absolute z-30 flex -translate-x-1/2  left-1/2 space-x-3 rtl:space-x-reverse -mt-7">
                    <button type="button" class="w-2 h-2 rounded-full " aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                  </div>
                  <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                  </button>
                  <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                      <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="sr-only">Next</span>
                    </span>
                  </button>
                </div>
                <h3>
                <a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Exclusive Bus
                </a>
                </h3>
                <div class="flex mb-2">
                  <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                  </svg>
                  <p class="text-sm font-semibold ml-1">45</p>
                  <sup class="text-xs text-gray-500"> Kapasitas </sup>
                </div>
                <div class="flex mb-2">
                    <img src="{{ asset('img/transportasi/bensin.png') }}" alt="bbm" class="w-5 h-5">
                    <p class="text-sm font-semibold ml-2">Bensin</p>
                    <sup class="text-xs text-gray-500"> Fuel </sup>
                </div>
                <p class="text-sm text-gray-500 mb-1  flex justify-between">status : Available <span class=" text-black font-bold text-base">Rp 2.500.000</span></p>
                <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
              </div>
            </div>
          </div>
          <div class="w-full px-4 sm:w-1/2 lg:w-1/2 xl:w-1/3 mb-5">
            <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
              <div class="py-8 px-6">
                  <div id="default-carousel" class=" relative w-full" data-carousel="slide">
                    <div class="relative h-56 overflow-hidden rounded-md ">
                      <div class="hidden duration-700 ease-in-out" data-carousel-item>
                          <img src="{{ asset('img/penginapan/bad_2.jpg') }}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                      </div>
                      <div class="hidden duration-700 ease-in-out" data-carousel-item>
                          <img src="{{ asset('img/penginapan/lemari_2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                      </div>
                      <div class="hidden duration-700 ease-in-out" data-carousel-item>
                          <img src="{{ asset('img/penginapan/toilet.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md" alt="...">
                      </div>
                    </div>
                    <div class="absolute z-30 flex -translate-x-1/2  left-1/2 space-x-3 rtl:space-x-reverse -mt-7">
                      <button type="button" class="w-2 h-2 rounded-full " aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                      <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                      <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    </div>
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                      <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                          <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                          </svg>
                          <span class="sr-only">Previous</span>
                      </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                      <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                          <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                          </svg>
                          <span class="sr-only">Next</span>
                      </span>
                    </button>
                  </div>
                  <h3><a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Sewa Asrama (Umum)</a></h3>
                  <div class="flex mb-2">
                    <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm font-semibold ml-1">2</p>
                    <sup class="text-xs text-gray-500"> Orang / kamar </sup>
                  </div>
                  <div class="flex mb-2">
                      <img src="{{ asset('img/transportasi/bensin.png') }}" alt="bbm" class="w-5 h-5">
                      <p class="text-sm font-semibold ml-2">Wifi </p>
                      <sup class="text-xs text-gray-500"> Free </sup>
                  </div>
                  <p class="text-xs text-gray-500 mb-1  flex justify-between">*pembayaran tanpa DP  <span class=" text-black font-bold text-base">Rp 125.000</span></p>
                  <p class=" text-sm text-gray-500 mb-1 float-right "> orang / Hari</p>
                  <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
              </div>
            </div>
          </div>
          <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
              <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                  <div class="py-8 px-6">
                    <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="" class="shadow-lg rounded-md">
                      <h3>
                      <a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                      </h3>
                      <p>Kapasitas</p>
                      <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                      <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span> <iconify-icon icon="material-symbols:person-add-rounded"  style="color: #FF7417"></iconify-icon></p>
                      <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span class="font-bold">Rp 500.000</span></p>
                      <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                      <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
                  </div>
              </div>
          </div>
          <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
              <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                  <div class="py-8 px-6">
                      <img class="shadow-lg rounded-md" src="{{ asset('img/transportasi/bus.JPG') }}" alt="">
                      <h3>
                      <a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                      </h3>
                      <p>Kapasitas</p>
                      <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                      <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span> <iconify-icon icon="material-symbols:person-add-rounded"  style="color: #FF7417"></iconify-icon></p>
                      <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span class="font-bold">Rp 500.000</span></p>
                      <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                      <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
                  </div>
              </div>
          </div>
          <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
              <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                  <div class="py-8 px-6">
                      <img class="shadow-lg rounded-md" src="{{ asset('img/transportasi/bus.JPG') }}" alt="">
                      <h3>
                      <a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                      </h3>
                      <p>Kapasitas</p>
                      <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                      <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span> <iconify-icon icon="material-symbols:person-add-rounded"  style="color: #FF7417"></iconify-icon></p>
                      <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span class="font-bold">Rp 500.000</span></p>
                      <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                      <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
                  </div>
              </div>
          </div>
          <div class="w-full px-4 lg:w-1/2 xl:w-1/3 mb-2">
              <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                  <div class="py-8 px-6">
                      <img class="shadow-lg rounded-md" src="{{ asset('img/transportasi/bus.JPG') }}" alt="">
                      <h3>
                      <a href=" /detailbus" class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">Bus</a>
                      </h3>
                      <p>Kapasitas</p>
                      <p class="font-medium text-sm text-gray-500 mb-1">Harga termasuk Driver</p>
                      <p><span class="icon-[material-symbols--person-add-rounded]" style="color: #FF7417;"></span> <iconify-icon icon="material-symbols:person-add-rounded"  style="color: #FF7417"></iconify-icon></p>
                      <p class="font-medium text-sm text-black mb-1  flex justify-between">Status : Available <span class="font-bold">Rp 500.000</span></p>
                      <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                      <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#" class=" text-sm   text-white    " >Sewa</a></button>
                  </div>
              </div>
          </div>
        </div> -->
            <div class="container w-full xl:w-10/12">
                <div class="flex flex-wrap justify-center items-center mx-auto xl:space-x-2 space-y-2 ">
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Transportasi</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/transportasi" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Gedung</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/gedung" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Layanan</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/layanan" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Asrama</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/asrama" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="xl:w-1/6 bg-white border-2 border-gray-100 shadow-md h-80 p-2 items-center text-center">
                        <img src="{{ asset('img/kategori/hotel.png') }}" alt=""
                            class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Alat Barang</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 ">Aset pada kategori transportasi kami memiliki sebanyak 8
                            buah transportasi.</p>
                        <a href="/alatbarang" class="inline-flex font-medium items-center text-primary hover:underline">
                            Sewa sekarang
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- kategori section End -->
    <!-- Promo Section start -->

    <section id="promo" class="pt-36 pb-36 bg-plaster">
        <div class="container">
            <div class="w-full  px-4 ">
                <div class=" mx-auto text-center mb-12">
                    <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">PROMO</h2>
                    <p class="font-medium text-base md:text-lg">Penawaran promo sangat beragam. Lakukan penyewaan sekarang
                        juga dan dapatkan promo menarik lainnya !</p>
                </div>
            </div>

            <div class=" container xl:w-10/12  ">
                <div class="flex flex-wrap  pb-2 kategori-promo  xl:space-x-2   text-[14px] ">
                    <div
                        class="bg-white w-1/4  h-8 xl:w-28 flex items-center justify-center rounded-md mb-2 space-kanan cursor-pointer hover:focus:ring-primary hover:border-primary hover:border-2  ">
                        <a href="" class="overflow-hidden">Semua</a> </div>
                    <div
                        class="bg-white  w-1/4  h-8 xl:w-28 flex items-center justify-center rounded-md mb-2 space-kanan  cursor-pointer hover:focus:ring-primary hover:border-primary hover:border-2  ">
                        <a href="" class="overflow-hidden">Transportasi</a> </div>
                    <div
                        class="bg-white w-1/4  xl:w-28 h-8 flex items-center justify-center rounded-md mb-2 space-kanan  cursor-pointer   hover:focus:ring-primary hover:border-primary hover:border-2  ">
                        <a href="" class="overflow-hidden">GedungLap</a></div>
                    <div
                        class="bg-white w-1/4  xl:w-28 h-8 flex items-center justify-center rounded-md mb-2 space-kanan cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  ">
                        <a href="" class="overflow-hidden">Asrama</a></div>
                    <div
                        class="bg-white w-1/4  xl:w-28 h-8 flex items-center justify-center rounded-md mb-2 space-kanan cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2  ">
                        <a href="" class="overflow-hidden">Layanan</a></div>
                    <div
                        class="bg-white w-1/4  xl:w-28 h-8  flex items-center justify-center  rounded-md mb-2 space-kanan cursor-pointer  hover:focus:ring-primary hover:border-primary hover:border-2 ">
                        <a href="" class="overflow-hidden">Alat Barang</a></div>
                </div>
                <div id="controls-carousel" class="relative    " data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <!-- <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> -->
                            <div
                                class="absolute block w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
                                <div class="flex flex-row"><a href="#"
                                        class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                        <div class="flex space-x-2">
                                            <div class="basis-1/2">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Idul
                                                    Fitri</h5>
                                                <div class="flex  items-center">
                                                    <h4 class="text-base mr-2">Hemat</h4>
                                                    <span class="text-4xl font-bold">50%</span>
                                                </div>
                                                <p
                                                    class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4">
                                                    2024IED</p>
                                            </div>
                                            <div class="basis-1/2 relative">
                                                <div
                                                    class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                                                    <p class="text-sm text-white">Sewa sekarang!</p>
                                                </div>
                                                <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"
                                                    class=" rounded-md w-full " />
                                            </div>

                                        </div>
                                        <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="duration-700 ease-in-out" data-carousel-item="active">
                            <div
                                class="absolute block w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
                                <div class="flex flex-row"><a href="#"
                                        class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                        <div class="flex space-x-2">
                                            <div class="basis-1/2">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo
                                                    Natal</h5>
                                                <div class="flex  items-center">
                                                    <h4 class="text-base mr-2">Hemat</h4>
                                                    <span class="text-4xl font-bold">50%</span>
                                                </div>
                                                <p
                                                    class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4">
                                                    2024IED</p>
                                            </div>
                                            <div class="basis-1/2 relative">
                                                <div
                                                    class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                                                    <p class="text-sm text-white">Sewa sekarang!</p>
                                                </div>
                                                <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"
                                                    class=" rounded-md w-full " />
                                            </div>

                                        </div>
                                        <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Item 3 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <div
                                class="absolute block w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
                                <div class="flex flex-row"><a href="#"
                                        class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                        <div class="flex space-x-2">
                                            <div class="basis-1/2">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo
                                                    Ramadhan</h5>
                                                <div class="flex  items-center">
                                                    <h4 class="text-base mr-2">Hemat</h4>
                                                    <span class="text-4xl font-bold">50%</span>
                                                </div>
                                                <p
                                                    class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4">
                                                    2024IED</p>
                                            </div>
                                            <div class="basis-1/2 relative">
                                                <div
                                                    class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                                                    <p class="text-sm text-white">Sewa sekarang!</p>
                                                </div>
                                                <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"
                                                    class=" rounded-md w-full " />
                                            </div>

                                        </div>
                                        <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Item 4 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <div
                                class="absolute block w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
                                <div class="flex flex-row"><a href="#"
                                        class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                        <div class="flex space-x-2">
                                            <div class="basis-1/2">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo
                                                    Tahun Baru</h5>
                                                <div class="flex  items-center">
                                                    <h4 class="text-base mr-2">Hemat</h4>
                                                    <span class="text-4xl font-bold">50%</span>
                                                </div>
                                                <p
                                                    class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4">
                                                    2024IED</p>
                                            </div>
                                            <div class="basis-1/2 relative">
                                                <div
                                                    class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                                                    <p class="text-sm text-white">Sewa sekarang!</p>
                                                </div>
                                                <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"
                                                    class=" rounded-md w-full " />
                                            </div>

                                        </div>
                                        <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <div
                                class="absolute block w-full  sm:w-1/2 lg:w-1/2 xl:w-1/3 hover:scale-105 transition  ease-in-out delay-150  ">
                                <div class="flex flex-row"><a href="#"
                                        class="block max-w-sm p-4  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                        <div class="flex space-x-2">
                                            <div class="basis-1/2">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Idul
                                                    Adha</h5>
                                                <div class="flex  items-center">
                                                    <h4 class="text-base mr-2">Hemat</h4>
                                                    <span class="text-4xl font-bold">50%</span>
                                                </div>
                                                <p
                                                    class="mt-5 inline-block bg-plaster h-6 w-full text-center rounded-md tracking-widest text-sm mb-4">
                                                    2024IED</p>
                                            </div>
                                            <div class="basis-1/2 relative">
                                                <div
                                                    class="absolute right-0 top-2 text-center h-6 w-32 rounded-s-lg bg-primary">
                                                    <p class="text-sm text-white">Sewa sekarang!</p>
                                                </div>
                                                <img src="{{ asset('img/layanan/marching band.jpg') }}" alt="picture 1"
                                                    class=" rounded-md w-full " />
                                            </div>

                                        </div>
                                        <p class="text-gray-400 text-sm ">*periode 1 Januari - 1 Februari</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider controls -->
                    <div class="controls-wrapper flex -mt-28">
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- end coba new -->


                <div class="flex justify-center">
                    <a href="/promo"><button id="loadmore_promo"
                            class="font-semibold text-medium text-black mt-6 mb-8 uppercase underline underline-offset-2 mx-auto">Lihat
                            Lebih Banyak</button></a>
                    <button id="hidemore_promo"
                        class="font-semibold text-medium text-black mb-8 uppercase underline underline-offset-2 mx-auto hidden">Sembunyikan</button>
                </div>
            </div>

            <!-- <div id="buttonpromo" class=" relative  mb-4 mt-4">
          <div onclick="toggleDropdownPromo()"
            class="text-sm flex cursor-pointer rounded justify-between bg-white  mx-auto px-4 xl:ml-36  p-2 h-10 w-[185px] ">Semua kategori
            <svg class="w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </div>
          <div id="dropdownPromo" class="rounded border-[2px] border-white bg-white p-2 relative top-1 left-36 w-[185px] shadow-md hidden">
            <div class="cursor-pointer hover:bg-gray-50 p-2">Transportasi</div>
            <div class="cursor-pointer hover:bg-gray-50 p-2">Gedung</div>
            <div class="cursor-pointer hover:bg-gray-50 p-2">Penginapan</div>
            <div class="cursor-pointer hover:bg-gray-50 p-2">Layanan</div>
            <div class="cursor-pointer hover:bg-gray-50 p-2">Asset</div>
          </div>
        </div>
          <script>
              function toggleDropdownPromo() {
                  let dropdownPromo = document.querySelector("#buttonpromo #dropdownPromo");
                  dropdownPromo.classList.toggle("hidden");
              }
          </script>  -->
        </div>
        </div>
    </section>
    <!-- Promo Section End -->
    <!-- Section Syarat dan Ketentuan Start -->
    <section id="syarat" class="pt-36 pb-28 bg-white">
        <div class="container">
            <div cl ass="w-full px-4">
                <div class="mx-auto text-center mb-12 ">
                    <h4 class="font-semibold text-black text-3xl mb-2">PERTANYAAN UMUM SEWA ASET</h4>
                    <!-- <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">Ketentuan sewa</h2> -->
                    <!-- <p class="font-medium text-medium md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quas corrupti ducimus, explicabo possimus tenetur tempore repellat obcaecati aperiam voluptatibus.</p> -->
                </div>
            </div>
            <div class="w-full px-12  xl:w-10/12  mx-auto">
                <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100  text-blue-600 ">
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-grecianblue  focus:ring-4 focus:ring-blue-200    hover:bg-blue-100  gap-3"
                                data-accordion-target="#accordion-color-body-1" aria-expanded="true"
                                aria-controls="accordion-color-body-1">
                                <span class="flex gap-2 ">
                                    <img class="max-w-none max-h-none " width="23" height="23"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    Tarif dan Biaya
                                </span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
                            <div class="p-5 border border-t-0 border-grecianblue ">
                                <p class="mb-2 text-gray-500 ">Tarif persewaan tidak ada tambahan lain. Biaya administrasi
                                    pelayanan di sewa aset poltekbang gratis.</p>
                                <p class="text-gray-500 "> Keterlambatan dan kerusakan barang dikenakan denda sampai dengan
                                    <a href="/docs/getting-started/introduction/"
                                        class="text-blue-600  hover:underline">30%</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-grecianblue focus:ring-4 focus:ring-blue-200    hover:bg-blue-100  gap-3"
                                data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                                aria-controls="accordion-color-body-2">
                                <div class="flex items-center gap-2">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Bagaimana saya melakukan sewa transportasi dari lokasi yang berbeda?</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 max-w-none max-h-none"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                            <div class="p-5 border border-t-0 border-grecianblue ">
                                <p class="mb-2 text-gray-500 ">Sewa transportasi di kami, <span
                                        class="font-bold">gratis</span> antar jemput dengan sopir yang profesional.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-3">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200    hover:bg-blue-100  gap-3"
                                data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                                aria-controls="accordion-color-body-3">
                                <div class="flex items-center gap-2 ">
                                    <img width="23" height="23" src="https://img.icons8.com/ios/50/help--v2.png"
                                        alt="help--v2" />
                                    <span>Ketentuan Pembayaran </span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                            <div class="p-5 border border-t-0 border-grecianblue">
                                <p class="mb-2 text-gray-500 ">Seluruh aset wajib dilakukan pembayaran DP 30%.</p>
                                <p class="mb-2 text-gray-500 ">Minimal DP 30% :</p>
                                <ul class="ps-5 text-gray-500 list-disc ">
                                    <li><a href="https://flowbite.com/pro/"
                                            class="text-blue-600  hover:underline">Kategori Transportasi</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600  hover:underline">Kategori Gedung</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600  hover:underline">Kategori Layanan</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600  hover:underline">Kategori Asset</a></li>
                                </ul>
                                <p class="mb-2 text-gray-500 ">Kecuali kategori penginapan, pembayaran dilakukan secara
                                    lunas 100%.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-4">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200    hover:bg-blue-100  gap-3"
                                data-accordion-target="#accordion-color-body-4" aria-expanded="false"
                                aria-controls="accordion-color-body-4">
                                <div class="flex items-center gap-2 ">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Jangka Waktu Penyelesaian </span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-4">
                            <div class="p-5 border border-t-0 border-grecianblue">
                                <p class="mb-2 text-gray-500 ">The main difference is that the core components from
                                    Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product.
                                    Another difference is that Flowbite relies on smaller and standalone components, whereas
                                    Tailwind UI offers sections of pages.</p>
                                <p class="mb-2 text-gray-500 ">However, we actually recommend using both Flowbite, Flowbite
                                    Pro, and even Tailwind UI as there is no technical reason stopping you from using the
                                    best of two worlds.</p>
                                <p class="mb-2 text-gray-500 ">Learn more about these technologies:</p>
                                <ul class="ps-5 text-gray-500 list-disc ">
                                    <li><a href="https://flowbite.com/pro/"
                                            class="text-blue-600  hover:underline">Flowbite </a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600  hover:underline">Tailwind UI</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-4">
                        <h2 id="accordion-color-heading-5">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200    hover:bg-blue-100  gap-3"
                                data-accordion-target="#accordion-color-body-5" aria-expanded="false"
                                aria-controls="accordion-color-body-5">
                                <div class="flex items-center gap-2 ">
                                    <img width="23" height="23" class="p-0"
                                        src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                    <span>Persyaratan Peminjaman </span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-color-body-5" class="hidden" aria-labelledby="accordion-color-heading-4">
                            <div class="p-5 border border-t-0 border-grecianblue">
                                <p class="mb-2 text-gray-500 ">1. Memiliki akun / mendaftar terlebih dahulu di sistem SEWA
                                    ASET.</p>
                                <p class="mb-2 text-gray-500 ">2. Berkas yang harus disiapkan ketika mendaftar:</p>
                                <ul class="ps-5 text-gray-500 list-disc ">
                                    <li><a href="https://flowbite.com/pro/" class="text-blue-600  hover:underline">Foto
                                            KTP</a></li>
                                    <li><a href="https://tailwindui.com/" rel="nofollow"
                                            class="text-blue-600  hover:underline"></a></li>
                                </ul>
                            </div>
                        </div>

                        <button id="loadmore_promo"
                            class="font-semibold text-medium text-black mb-8 uppercase underline underline-offset-2">Lihat
                            Lebih
                            Banyak</button>
                        <button id="hidemore_promo"
                            class="font-semibold text-medium text-black mb-8 uppercase underline underline-offset-2 hidden">Sembunyikan</button>
                    </div>
                </div>
    </section>
    <<<<<<< HEAD <!-- Promo Section End -->
        <!-- Section Syarat dan Ketentuan Start -->
        <section id="syarat" class="pt-36 pb-28 bg-white xl:w-10/12 mx-auto">
            <div class="container">
                <div cl ass="w-full px-4">
                    <div class="mx-auto text-center mb-12 ">
                        <h4 class="font-semibold text-lg text-primary mb-2">PERTANYAAN UMUM SEWA ASET</h4>
                        <!-- <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">Ketentuan sewa</h2> -->
                        <!-- <p class="font-medium text-medium md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quas corrupti ducimus, explicabo possimus tenetur tempore repellat obcaecati aperiam voluptatibus.</p> -->
                    </div>
                </div>
                <div class="w-full px-12">
                    <div id="accordion-color" data-accordion="collapse"
                        data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                        <div class="pb-4 pt-4">
                            <h2 id="accordion-color-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-grecianblue  focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-color-body-1" aria-expanded="true"
                                    aria-controls="accordion-color-body-1">
                                    <span class="flex gap-2 ">
                                        <img class="max-w-none max-h-none " width="23" height="23"
                                            src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                        Tarif dan Biaya
                                    </span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
                                <div
                                    class="p-5 border border-t-0 border-grecianblue dark:border-gray-700 dark:bg-gray-900">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Tarif persewaan tidak ada tambahan
                                        lain.
                                        Biaya administrasi pelayanan di sewa aset poltekbang gratis.</p>
                                    <p class="text-gray-500 dark:text-gray-400"> Keterlambatan dan kerusakan barang
                                        dikenakan
                                        denda sampai dengan <a href="/docs/getting-started/introduction/"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">30%</a>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="pb-4 pt-4">
                            <h2 id="accordion-color-heading-2">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                                    aria-controls="accordion-color-body-2">
                                    <div class="flex items-center gap-2">
                                        <img width="23" height="23" class="p-0"
                                            src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                        <span>Bagaimana saya melakukan sewa transportasi dari lokasi yang berbeda?</span>
                                    </div>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 max-w-none max-h-none"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                                <div class="p-5 border border-t-0 border-grecianblue dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Sewa transportasi di kami, <span
                                            class="font-bold">gratis</span> antar jemput dengan sopir yang profesional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="pb-4 pt-4">
                            <h2 id="accordion-color-heading-3">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                                    aria-controls="accordion-color-body-3">
                                    <div class="flex items-center gap-2 ">
                                        <img width="23" height="23"
                                            src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                        <span>Ketentuan Pembayaran </span>
                                    </div>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                                <div class="p-5 border border-t-0 border-grecianblue">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Seluruh aset wajib dilakukan
                                        pembayaran DP
                                        30%.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Minimal DP 30% :</p>
                                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                        <li><a href="https://flowbite.com/pro/"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Kategori
                                                Transportasi</a></li>
                                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Kategori
                                                Gedung</a>
                                        </li>
                                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Kategori
                                                Layanan</a>
                                        </li>
                                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Kategori Asset</a>
                                        </li>
                                    </ul>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Kecuali kategori penginapan,
                                        pembayaran
                                        dilakukan secara lunas 100%.</p>
                                </div>
                            </div>
                        </div>
                        <div class="pb-4 pt-4">
                            <h2 id="accordion-color-heading-4">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-color-body-4" aria-expanded="false"
                                    aria-controls="accordion-color-body-4">
                                    <div class="flex items-center gap-2 ">
                                        <img width="23" height="23" class="p-0"
                                            src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                        <span>Jangka Waktu Penyelesaian </span>
                                    </div>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-4">
                                <div class="p-5 border border-t-0 border-grecianblue">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core
                                        components from Flowbite are open source under the MIT license, whereas Tailwind UI
                                        is a
                                        paid product. Another difference is that Flowbite relies on smaller and standalone
                                        components, whereas Tailwind UI offers sections of pages.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using
                                        both
                                        Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason
                                        stopping
                                        you from using the best of two worlds.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:
                                    </p>
                                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                        <li><a href="https://flowbite.com/pro/"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a>
                                        </li>
                                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pb-4 pt-4">
                            <h2 id="accordion-color-heading-5">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-grecianblue focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-color-body-5" aria-expanded="false"
                                    aria-controls="accordion-color-body-5">
                                    <div class="flex items-center gap-2 ">
                                        <img width="23" height="23" class="p-0"
                                            src="https://img.icons8.com/ios/50/help--v2.png" alt="help--v2" />
                                        <span>Persyaratan Peminjaman </span>
                                    </div>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-5" class="hidden"
                                aria-labelledby="accordion-color-heading-4">
                                <div class="p-5 border border-t-0 border-grecianblue">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">1. Memiliki akun / mendaftar terlebih
                                        dahulu di sistem SEWA ASET.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">2. Berkas yang harus disiapkan ketika
                                        mendaftar:</p>
                                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                        <li><a href="https://flowbite.com/pro/"
                                                class="text-blue-600 dark:text-blue-500 hover:underline">Foto KTP</a></li>
                                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                                class="text-blue-600 dark:text-blue-500 hover:underline"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Section Syarat dan Ketentuan End -->
        <section id="plus" class="pt-20 pb-16 bg-plaster">
            <div class="container">
                <div class=" w-full px-4">
                    <div class="mx-auto text-right mr-20 mb-20">
                        <h4 class="font-bold text-xl  uppercase text-primary ">Mengapa harus sewa di sewaaset poltkebang
                            surabaya?</h4>
                    </div>
                    <div class="flex flex-wrap px-6">
                        <div class="w-full grid place-items-center h-full md:w-1/2 lg:w-1/2 sm:justify-center ">
                            <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni" class="object-cover ">
                        </div>
                        <div class="w-full px-4 mb-10 md:w-1/2 lg:w-1/2">
                            <div class="flex items-center pb-4 pt-2">
                                <img src="{{ asset('img/landingpage/1.png') }}" alt="Waktu" class="h-10 w-10">
                                <div class="ml-3">
                                    <p class=" font-bold  ">Semua keperluan dalam acara bisa sewa satu tempat</p>
                                    <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah
                                        bingung
                                        untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                                </div>
                            </div>
                            <div class="flex items-center pb-4 pt-2">
                                <img src="{{ asset('img/landingpage/2.png') }}" alt="Waktu" class="h-10 w-10">
                                <div class="ml-3">
                                    <p class=" font-bold  ">Cara bayar mudah dengan berbagai metode pembayaran </p>
                                    <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah
                                        bingung
                                        untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                                </div>
                            </div>
                            <div class="flex items-center pb-4 pt-2">
                                <img src="{{ asset('img/landingpage/4.png') }}" alt="Waktu" class="h-10 w-10">
                                <div class="ml-3">
                                    <p class=" font-bold  ">Pemesanan bisa dibicarakan secara langsung </p>
                                    <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah
                                        bingung
                                        untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                                </div>
                            </div>
                            <div class="flex items-center pb-4 pt-2">
                                <img src="{{ asset('img/landingpage/3.png') }}" alt="Waktu" class="h-10 w-10">
                                <div class="ml-3">
                                    <p class=" font-bold  ">Pelayanan yang unggul</p>
                                    <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak usah
                                        bingung
                                        untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    =======
                    <!-- Section Syarat dan Ketentuan End -->
                    <section id="plus" class="pt-20 pb-16 bg-white">
                        <div class="container">
                            <div class=" w-full px-4">
                                <div class="mx-auto text-right xl:mr-20 mb-20">
                                    <h4 class="font-bold text-xl  uppercase text-primary ">Mengapa harus sewa di sewaaset
                                        poltkebang surabaya?</h4>
                                </div>
                                <div class="flex flex-wrap px-6">
                                    <div class="w-full  place-items-center h-full  md:w-1/2 lg:w-1/2 sm:justify-center ">
                                        <!-- <div class=" bg-white w-96 h-48 rounded-xl "></div> -->
                                        <div class="flex flex-row mx-auto xl:w-1/2">
                                            <div class="flex-col">
                                                <div class="bg-white roundedlr space-y-2 ">
                                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                                        class="object-cover p-2 ">
                                                </div>
                                                <div class="bg-softblue roundedrl space-x-2 ">
                                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                                        class="object-cover  p-2  ">
                                                </div>
                                            </div>
                                            <div class="flex-col ">
                                                <div class="bg-softblue roundedrl space-y-2 ">
                                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                                        class="object-cover p-2 ">
                                                </div>
                                                <div class="bg-white roundedlr ">
                                                    <img src="{{ asset('img/tar.png') }}" alt="Foto Taruna Taruni"
                                                        class="object-cover p-2  ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full px-4 mb-10 md:w-1/2 lg:w-1/2">
                                        <div class="flex items-center pb-4 pt-2">
                                            <img src="{{ asset('img/landingpage/1.png') }}" alt="Waktu"
                                                class="h-10 w-10">
                                            <div class="ml-3">
                                                <p class=" font-bold  ">Semua keperluan dalam acara bisa sewa satu tempat
                                                </p>
                                                <p class="text-justify ">Dengan melakukan pemesanan gedung maka anda tidak
                                                    usah bingung untuk menyewa tempat penyewaan kursi, kamera , dll.</p>
                                            </div>
                                            >>>>>>> HOME-FE
                                        </div>
                                    </div>
                    </section>
                    <<<<<<< HEAD <!-- Informasi Kontak -->
                        <section class="pb-16 pt-16">
                            <div class="container">
                                <div class="w-full px-4">
                                    <div class="mx-auto text-center mb-16">
                                        <h4 class="font-semibold text-lg text-primary mb-2">Kontak</h4>
                                        <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">Informasi
                                            Kontak</h2>
                                        <p class="font-medium text-medium md:text-lg">Jika terdapat pertanyaan, aduan,
                                            atau hal yang harus
                                            dikonfirmasi terlebih dahulu. Anda bisa langsung menghubungi kontak berikut ini
                                            .</p>
                                    </div>
                                </div>
                                <div
                                    class=" mx-auto text-center p-7 justify-center items-center h-28 w-72 rounded-lg bg-gray-50">
                                    <p class="font-bold text-sm pb-2">WhatsApp</p>
                                    <div class="flex ml-5 hover:bg-primary hover:text-white">
                                        <a aria-label="Chat on WhatsApp"
                                            href="https://wa.me/6289529811097/?text=Hello Saya Ingin bertanya">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20"
                                                height="20" viewBox="0 0 50 50">
                                                <path
                                                    d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z">
                                                </path>
                                            </svg>
                                        </a>
                                        <p>+62 896578110 (Dodo)</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Contact -->
                            <!-- back to top -->
                            <a href="#home">
                                <i class=" btnbtt btn-active  fixed bottom-10 right-10 text-5xl cursor pointer text-primary hover:text-primary z-20 hidden"
                                    title="Kembali ke atas"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                                    </svg>
                                </i>
                            </a>
                            <!-- end back to top -->
                        </section>
                        =======
                        <!-- Informasi Kontak -->
                        <!-- <section class="pb-16 pt-16">
          <div class="container">
              <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                  <h4 class="font-semibold text-lg text-primary mb-2">Kontak</h4>
                  <h2 class="font-bold text-black text-3xl mb-4 sm:text-4xl lg:text-5xl">Informasi Kontak</h2>
                  <p class="font-medium text-medium md:text-lg">Jika terdapat pertanyaan, aduan, atau hal yang harus dikonfirmasi terlebih dahulu. Anda bisa langsung menghubungi kontak berikut ini .</p>
                </div>
              </div>
              <div class=" mx-auto text-center p-7 justify-center items-center h-28 w-72 rounded-lg bg-gray-50" >
                <p class="font-bold text-sm pb-2">WhatsApp</p>
                <div class="flex ml-5 hover:bg-primary hover:text-white">
                  <a aria-label="Chat on WhatsApp" href="https://wa.me/6289529811097/?text=Hello Saya Ingin bertanya">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                  <path d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z"></path>
                  </svg>
                </a>
                <p title="klik untuk menghubungi">+62 896578110 (Dodo)</p>
                </div>
              </div>
          </div>
        </section> -->
                        <!-- End Contact -->
                        <!-- back to top -->
                        <div class=" ">
                            <a href="#home" class="">
                                <i class=" btnbtt btn-active fixed bottom-6 right-9 text-5xl cursor pointer text-primary hover:bg-gray-100 z-20 hidden bg-softblue rounded-full w-10 h-10 "
                                    title="Kembali ke atas"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-7 h-7 mt-1 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                        <!-- end back to top -->
                        <!-- call -->
                        <div class="relative">
                            <div class=" cursor-pointer w-10 h-10 border rounded-full bg-softblue  flex fixed  right-20 bottom-6 bocursor-pointer hover:w-30 hover:h-10 hover:Hubungi Kami !"
                                title="Chat sekarang ! ">
                                <a aria-label="Chat on WhatsApp"
                                    href="https://wa.me/6289529811097/?text=Hello Saya Ingin bertanya"
                                    class="mx-auto mt-1 ">
                                    <span class="w-10 h-10 text-xl ">📞</span>
                                </a>
                            </div>
                        </div>
                        <!-- end call -->
                        >>>>>>> HOME-FE
                    @endsection
