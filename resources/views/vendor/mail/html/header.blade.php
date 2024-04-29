@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                {{-- <p class="link-header">
                    Politeknik
                    Penerbangan Surabaya</p> --}}
                <img src="{{ asset('img/LogoPoltekbang.png') }}" alt="" class="logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
