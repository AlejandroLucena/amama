<div class="mb-4">
    {!! Form::label($name, $title, ['class' => 'block text-gray-700 text-sm font-bold mb-2', 'for' => $id]) !!}
    {!! Form::$type($name, isset($value) ? $value : null, ['id' => $id, 'class' => 'shadow-md appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{$class}}', 'placeholder' => $placeholder ]) !!}
</div>