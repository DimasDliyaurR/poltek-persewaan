<div class="bg-white p-4 rounded-md {{ $class }}"
    @if ($isId) id="{{ $id }}" @endif>
    {{ $slot }}
</div>
