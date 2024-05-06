@extends('layouts-home.navbar.comp')
@section('scriptlink')
<style>
  .bgImage{
    
    animation: bgChange 20s linear infinite;
    background-image: url("{{ asset('img/gerbang.jpg') }}");
  }
  @keyframes bgChange {
      0% {
          background-image: url("{{ asset("../../img/landingpage/gerbang.jpg") }}");
      }
      20% {
          background-image: url("{{ asset("../../img/landingpage/bad_2.jpg") }}");
      }
      25% {
          background-image: url("{{ asset("../../img/landingpage/bus_kiri.jpg") }}");
      }
      45% {
          background-image: url("{{ asset("../../img/landingpage/lab.jpg") }}");
      }
      50% {
          background-image: url("{{ asset("../../img/landingpage/marchingband.jpg") }}");
      }
      70% {
          background-image: url("{{ asset("../../img/landingpage/marchingband.jpg") }}");
      }
      75% {
          background-image: url("{{ asset("../../img/landingpage/lab.jpg") }}");
      }
      95% {
          background-image: url("{{ asset("../../img/landingpage/marchingband.jpg") }}");
      }
  }
</style>
@endsection
@section('content')
<!-- Hero Section Start -->
<section id="home" class="pt-20 pb-48 h-2/5 relative  ">
    <div class="bgImage absolute inset-0   h-full  bg-cover  bg-no-repeat bg-white opacity-50 bg-center" >
    </div>     
</section>
  <!-- Hero Section End -->
  <div id="kat" class=" relative bg-white rounded-lg flex  flex-wrap xl:w-3/5 mx-auto xl:shadow-lg  -mt-20">
    <div class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 bg-primary text-white rounded-lg p-4 cursor-pointer active flex justify-center items-center">
        <a href="/transportasi" class=" m-auto ">Transportasi
        <svg version="1.1" class="text-white  mt-6 h-16 w-16 mx-auto" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
        <path fill="#FB761C" opacity="1.000000" stroke="none"  class="fill-white"
            d="
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
        z"/>
        <path fill="#F87821" class="fill-white" opacity="1.000000" stroke="none" 
            d="
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
        z"/>
        <path fill="#F87821" class="fill-white" opacity="1.000000" stroke="none" 
            d="
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
        z"/>
        <path fill="#F57B29" class="fill-white" opacity="1.000000" stroke="none" 
            d="
        M21.822670,355.634888 
            C23.273113,355.962036 24.925207,356.283234 25.601360,357.271881 
            C27.506319,360.057251 28.646856,363.417236 30.770912,365.986816 
            C33.043030,368.735504 31.661922,370.217773 29.687555,371.645966 
            C28.262783,372.676575 26.468861,373.179108 24.924498,374.065186 
            C18.697033,377.638062 18.680422,377.676605 14.865259,371.348175 
            C13.044457,368.327911 11.356703,365.227448 9.615921,362.175995 
            C13.925508,359.927216 17.752150,357.930420 21.822670,355.634888 
        z"/>
        <path fill="#F47A28" class="fill-white" opacity="1.000000" stroke="none" 
            d="
        M477.533081,122.768929 
            C474.297760,123.873940 470.906158,126.194000 468.653137,125.376427 
            C466.350464,124.540840 465.120880,120.654327 463.504181,118.052040 
            C462.229370,116.000130 461.080017,113.870308 459.843567,111.720619 
            C463.664062,109.615860 467.206421,107.606796 470.804779,105.703636 
            C472.950409,104.568840 474.697052,104.548256 476.060364,107.192177 
            C478.057404,111.065086 480.446320,114.735931 482.895325,118.876907 
            C481.237335,120.109100 479.556976,121.357925 477.533081,122.768929 
        z"/>
        <path fill="#FEB47F" class="fill-white"s opacity="1.000000" stroke="none" 
            d="
        M234.304718,472.904327 
            C237.669174,472.550079 241.509216,472.134888 245.355530,472.065216 
            C250.417236,471.973480 255.483887,472.153381 260.869629,472.513977 
            C252.388290,472.873352 243.585693,472.935242 234.304718,472.904327 
        z"/>
        <path fill="#FAC39E" class="fill-white" opacity="1.000000" stroke="none" 
            d="
        M256.751221,33.526104 
            C248.370209,33.836216 239.678329,33.856533 230.525146,33.894028 
            C238.856033,33.686241 247.648209,33.461273 256.751221,33.526104 
        z"/>
        <path fill="#FD751A" class="fill-white" opacity="1.000000" stroke="none" 
            d="
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
        z"/>
        <path fill="#F9771F" class="fill-white" opacity="1.000000" stroke="none" 
            d="
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
        z"/>
        
        </svg>
        </a>
    </div>
    <div class=" xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none  h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center">
        <a href="/gedung">Gedung
        <img src="{{ asset('img/kategori/gedung.png') }}" alt="" class="mt-6 hover:filter hover:invert h-16 w-16  mx-auto">
        </a>
    </div>
    <div class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center ">
        <a href="/layanan">Layanan
        <img src="{{ ('img/kategori/layanan.png') }}" alt="" class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
        </a>
    </div>
    <div class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center">
        <a href="/asrama" ><span class="mb-8">Asrama</span>
        <img src="{{ asset('img/kategori/hotel.png') }}" alt="" class=" mt-6 hover:filter hover:invert h-16 w-16 mx-auto">
        </a>
    </div>
    <div class="xl:w-1/5 w-1/2  md:w-1/3 shadow-lg xl:shadow-none h-40 hover:bg-gray-300 hover:text-white rounded-lg p-4 flex justify-center items-center">
        <a href="/alatbarang">Alat Barang
            <img src="{{asset('img/kategori/asset.png')}}" alt="" class="mt-4 h-20 w-20 mx-auto">
        </a>
    </div>
</div>

<section id="kategori" class="pt-16 pb-16 bg-white ">
<div class="container">
        <div class="w-full">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2">Kategori</h4>
                <h2 class="font-bold text-black text-3xl mb-8 sm:text-2xl lg:text-xl"> <a href="/"
                        class="hover:text-primary" title="Kembali ke halaman awal">Home </a>> Kategori > {{ $title }}</h2>
            </div>

            <div class="pt-10 pb-20  relative md:max-auto">
                <form action="/transportasi" class="w-56 absolute right-4">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white ">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-plaster rounded-lg focus:ring-primary focus:border-plaster dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="Cari ..."/>
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-plaster focus:ring-4 focus:outline-none focus:ring-plaster font-medium rounded-lg text-sm px-4 py-2 dark:bg-plaster dark:hover:bg-primary dark:focus:ring-gray-800">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full px-4 lg:w-1/2 md:w-1/3 sm:w-1/2 xl:w-1/3 mb-3">
                <div class="bg-white  rounded-xl shadow-lg overflow-hidden ">
                    <div class="py-8 px-6">
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <!-- <div class="relative h-56 overflow-hidden rounded-lg md:h-96"> -->
                            <div class="relative h-56 overflow-hidden rounded-md ">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ 'img/transportasi/bus.JPG' }}"
                                        class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ 'img/transportasi/bus_depan.JPG' }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ 'img/transportasi/bus_kiri.JPG' }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                        alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ 'img/transportasi/bus_kanan.JPG' }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 shadow-lg rounded-md"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex -translate-x-1/2  left-1/2 space-x-3 rtl:space-x-reverse -mt-7">
                                <button type="button" class="w-2 h-2 rounded-full " aria-current="true"
                                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>

                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
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
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                        <h3>
                            <a href=" /transportasi/detail"
                                class="block mb-3 mt-3 font-semibold text-xl text-black hover:text-primary truncate">
                            </a>
                        </h3>
                        <div class="flex mb-2">
                            <svg class="w-6 h-6 text-primary" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm font-semibold ml-1"></p>
                            <sup class="text-xs text-gray-500"> Kapasitas </sup>
                        </div>
                        <div class="flex mb-2">
                            <img src="{{ 'img/transportasi/bensin.png' }}" alt="bbm" class="w-5 h-5">
                            <p class="text-sm font-semibold ml-2">Bensin</p>
                            <sup class="text-xs text-gray-500"> Fuel </sup>
                        </div>
                        <p class="text-sm text-gray-500 mb-1  flex justify-between">Status <span
                                class=" text-black font-bold text-base">Rp
                                </span>
                        </p>
                        <p class=" text-sm text-gray-500 mb-1 float-right "> unit / Hari</p>
                        <button class=" h-8 w-full bg-primary rounded-lg hover:opacity-50"><a href="#"
                                class=" text-sm   text-white    ">Sewa</a>
                            </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
        <!-- <p class="font-bold uppercase pb-20">cari dengan kata kunci lain </p> -->

    </div>

</section>
@endsection

