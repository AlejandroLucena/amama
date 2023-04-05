<button 
    @isset($wired) wire:click="{{$wired}}" @endisset
    id="{{ $id ?? '' }}"
    class="px-4 mx-auto text-white bg-primary-500 hover:bg-primary-300 border-0 py-2 focus:outline-none rounded text-lg font-bold shadow-lg text-center {{ $size ?? '' }}">{{ $label }}</button>