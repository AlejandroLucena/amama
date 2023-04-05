<a 
    href="{{ $route }}"
    target="{{ isset($target) ? $target : '' }}"
    class="cursor-pointer bg-primary-500 hover:bg-primary-300 text-center font-bold text-white block my-4 p-3 border-white shadow-md {{ $size == "" ? "w-full" : $size }} {{ isset($class) ?? '' }}">
    {{ $label }}
</a>