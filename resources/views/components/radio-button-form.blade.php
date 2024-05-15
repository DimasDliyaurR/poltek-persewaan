<div class=" py-4 {{ $class }}">
    <p>{{ $title }}</p>
    <br>

    <div class="flex items-center mb-4">
        <input {{ ($update ? ($nameData == 1 ? 'checked' : '') : old($name) == 1) ? 'checked' : '' }}
            id="{{ $name }}" type="radio" value="1" name="{{ $name }}"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="{{ $name }}" class="ms-2 text-sm font-medium  dark:text-gray-500">{{ $option1 }}</label>
    </div>
    <div class="flex items-center">
        <input {{ ($update ? ($nameData == 0 ? 'checked' : '') : old($name) == 1) ? 'checked' : '' }}
            id="{{ $name }}" type="radio" value="0" name="{{ $name }}"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="{{ $name }}-1"
            class="ms-2 text-sm font-medium  dark:text-gray-500">{{ $option2 }}</label>
    </div>

    @error($name)
        <span class="text-red-600 text-sm ml-6">{{ $message }}</span>
    @enderror
</div>
