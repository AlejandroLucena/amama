<a 
    href={{ $route != '' ? $route : '#' }}
    class="{{ $class ?? '' }}"
    data-route="{{ isset($dataroute) ? $dataroute : '' }}"
    data-row="{{ isset($datarow) ? $datarow : '' }}"
>
    {{ $slot }}
</a>