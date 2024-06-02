<a {{ $attributes }}
    @if ($isBack) class="font-medium text-blue-600 dark:text-blue-500 hover:underline" 
@else    
class="font-medium text-black" @endif
    type="button">
    {{ $slot }}
</a>
