<a 
    href={{ $route != '' ? $route : '#' }}
    class="bg-primary-500 py-2 px-4 rounded-lg text-white text-center my-3 {{ $class ?? '' }}"
    data-route="{{ isset($dataroute) ? $dataroute : '' }}"
    data-row="{{ isset($datarow) ? $datarow : '' }}"
>
    {{ $slot }} <i class="ion ion-ios-arrow-thin-right"></i>
</a>