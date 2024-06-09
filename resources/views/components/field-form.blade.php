<div class="mb-5 {{ isset($class) ? $class : '' }}">
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $title }}</label>
    <input name="{{ $name }}" id="{{ $name }}"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-4 @error($name) border-red-500 @enderror"
        @if ($update) value="{{ isset($nameData) ? $nameData : '' }}" type="{{ isset($type) ? $type : 'text' }}"
            
        @else
            
        value="{{ old($name) }}" type="{{ isset($type) ? $type : 'type' }}" @endif>
    @error($name)
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>
