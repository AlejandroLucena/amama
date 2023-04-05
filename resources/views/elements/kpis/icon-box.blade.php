<div class="p-2 w-full md:w-1/4">
    <div class="flex items-center px-4 py-6 rounded-md bg-white shadow-md">
        <div class="p-3 rounded-full bg-{{ $style }} bg-opacity-75">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon ?? 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'}}" />
            </svg>
        </div>
        <div class="mx-5">
            <h4 class="text-2xl font-semibold text-gray-700">{{ $value }}</h4>
            <div class="text-gray-500 font-semibold">{{ $title }}</div>
        </div>
    </div>
</div>