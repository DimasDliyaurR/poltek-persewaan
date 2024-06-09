<div class="bg-white p-4 rounded-md {{ isset($class) ? $class : '' }}"
    @if (isset($isId) ? $isId : false) id="{{ isset($id) ? $id : '' }}" @endif>
    {{ $slot }}
</div>
