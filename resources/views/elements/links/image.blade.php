<a 
    href={{ $route != '' ? $route : '#' }}
    class="{{ $class ?? '' }}"
>
    {{ $slot }}
</a>