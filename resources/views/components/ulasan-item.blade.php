{{-- START COMMENT --}}
<div class="mt-4" wire:key="{{ $id }}">
    <div class="flex flex-row items-center">
        <span class="text-lg">{{ $username }}</span>
        <span
            class="h-auto text-[13px] ml-4 text-gray-400">{{ \Carbon\Carbon::parse(date('d-M-y h:i:s', $time))->isoFormat('hh:mm D MMMM Y') }}</span>
    </div>
    <div class="mt-2">
        <x-rating-show star="{{ $nilai }}" />
    </div>

    <div class="mt-4 p-2 border-b border-gray-200 text-gray-600">
        {{ $ulasan }}
    </div>

    {{-- START LIKE AND UNLIKE --}}
    <div class="flex gap-5">

        <div class="mt-3">
            {{-- START LIKE --}}
            <form wire:submit="like">
                <button class="flex flex-row items-center w-auto" x-on:click="$wire.set('id',{{ $id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-blue-400" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M23 10a2 2 0 0 0-2-2h-6.32l.96-4.57c.02-.1.03-.21.03-.32c0-.41-.17-.79-.44-1.06L14.17 1L7.59 7.58C7.22 7.95 7 8.45 7 9v10a2 2 0 0 0 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73zM1 21h4V9H1z" />
                    </svg>
                    <div class="ml-2 text-[15px]">{{ $liked }}</div>
                    {{-- END LIKE --}}
                </button>
            </form>
        </div>
        <div class="mt-3">
            {{-- START UNLIKE --}}
            <form wire:submit="dislike">
                <button class="flex flex-row items-center w-auto" x-on:click="$wire.set('id',{{ $id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-red-600" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 15h4V3h-4m-4 0H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2a2 2 0 0 0 2 2h6.31l-.95 4.57c-.02.1-.03.2-.03.31c0 .42.17.79.44 1.06L9.83 23l6.58-6.59c.37-.36.59-.86.59-1.41V5a2 2 0 0 0-2-2" />
                    </svg>
                    <div class="ml-2 text-[15px]">{{ $unlike }}</div>
                    {{-- END UNLIKE --}}
                </button>
            </form>
        </div>
    </div>
    {{-- END LIKE AND UNLIKE --}}
</div>
{{-- END COMMENT --}}
