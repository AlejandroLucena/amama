<div class="mb-4">
    {!! Form::label($name, $title, ['class' => 'block text-gray-700 text-sm font-bold mb-2', 'for' => '{{$id}}']) !!}
    {!! Form::checkbox($name, $value??null, $option) !!} {{$label}}
</div>