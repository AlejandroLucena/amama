<div class="mb-4">
    {!! Form::label($name, $label, ['class' => 'block text-gray-700 text-sm font-bold mb-2 ']) !!}
    <div class="custom-file">
        {!! Form::$type($name, ['id' => $name, 'class' => 'custom-file-input']) !!}
    </div>
</div>