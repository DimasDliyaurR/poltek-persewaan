<div class="relative rounded-lg border border-1 border-gray-200 p-4 w-1/2">
    <div id="container" class="relative hidden">
        <!-- Close the image -->
        {{-- <span onclick="this.parentElement.style.display='none'"
            class=" absolute mt-10 mr-15 bg-white cursor-pointer">&times;</span> --}}
        <!-- Expanded image -->
        <!-- <img id="expandedImg" style="width:100%"> -->
        <img id="expandedImg" class="w-80 md:w-full rounded-lg h-80 object-cover">
        {{-- <img id="expandedImg" class="xl:w-8/12 object-cover h-96 w-full lg:w-7/12"> --}}

        <!-- Image text -->
        <div id="imgtext"></div>
    </div>
    <div class="flex gap-2 mt-5 w-80 md:w-80">
        {{ $slot }}
    </div>
</div>
