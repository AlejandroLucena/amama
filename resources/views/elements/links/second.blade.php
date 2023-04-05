<a 
    href={{ $route != '' ? $route : '#' }}
    class="bg-second-500 p-4 rounded-lg text-white text-center my-3 {{ $class ?? '' }}"
>
    {{ $slot }} <i class="ion ion-ios-arrow-thin-right"></i>
</a>