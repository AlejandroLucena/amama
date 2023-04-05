<div class="mb-4">
    <div id="{{ $size == '' ? 'w-full' : $size }}" class=" {{ $size == '' ? 'w-full md:w-1/6' : $size }}">
        {!! Form::submit($textButton, [
        'class' => $class == '' ? 'cursor-pointer bg-primary-300 hover:bg-primary-500 text-center font-bold text-white
        block my-4 p-3 border-white shadow-md w-full' : "bg-primary-500 text-center font-bold text-white
        block my-4 p-3 border-white shadow-md $class"
        ]); !!}
    </div>
</div>