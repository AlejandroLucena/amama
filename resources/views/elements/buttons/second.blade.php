<a
    href="{{ $route }}" 
    target="{{ isset($target) ? $target : '' }}"
    class="
    text-center pointer-events-auto ml-8 rounded-md bg-second-600 py-2 px-3 text-[0.8125rem] font-semibold leading-5 text-white hover:bg-second-500 {{ $size == "" ? "w-full" : $size }}">
    {{ $label }}
</a>
