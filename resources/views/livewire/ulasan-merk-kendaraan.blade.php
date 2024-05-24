<div>
    <x-layout-detail-transaksi class="mt-4">
        <h3 class="font-bold">Beri kami ulasan tentang asset ini</h3>
        <form wire:submit="save">
            @csrf
            <div class="h-20 flex items-center">
                <span class="star-rating">
                    <input type="radio" wire:model="nilai" name="rating" value="1"><i></i>
                    <input type="radio" wire:model="nilai" name="rating" value="2"><i></i>
                    <input type="radio" wire:model="nilai" name="rating" value="3"><i></i>
                    <input type="radio" wire:model="nilai" name="rating" value="4"><i></i>
                    <input type="radio" wire:model="nilai" name="rating" value="5"><i></i>
                </span>

            </div>
            <div class="mb-5">
                <label for="ulasan" wire:model="ulasan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulasan</label>
                <textarea name="ulasan"
                    class="block w-full text-sm text-gray-900 border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4">{{ old('ulasan') }}</textarea>
            </div>
            <button type="submit" class="border border-gray-400 p-2 text-2xl"><svg xmlns="http://www.w3.org/2000/svg"
                    width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z" />
                </svg></button>
        </form>
    </x-layout-detail-transaksi>

    <x-layout-detail-transaksi class="mt-4">
        <div class="ml-4">
            {{-- TITTLE COMMENT --}}
            <div class="font-bold text-lg">
                {{ count($kendaraan->rating) }} Komentar
            </div>
            @forelse ($kendaraan->rating as $rating)
                <x-ulasan-item />
            @empty
                <div class="w-full text-center">Komentar tidak ada</div>
            @endforelse
        </div>
    </x-layout-detail-transaksi>

</div>
