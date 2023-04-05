<div class="mb-4">
  {!! Form::label($name, $title, ['class' => 'block text-gray-700 text-sm font-bold mb-2', 'for' => $id]) !!}
  <select
    class="multiselect shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{$class}}"
    multiple="multiple" name="{{$name}}[]" id="{{ $id }}">

  </select>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  // SET DEFAULT STYLES
  $(document).ready(function() {
  
    $(".select2-selection").addClass("shadow-md appearance-none pt-1 pb-4 border rounded w-full px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline");
    $(".select2-search__field").addClass("h-6");
  
  });

  
  // select default values in UPDATE VIEW
  var data2 = [];
  @if($values)
    @foreach($values as $key => $value)
    data2.push({
      id: {{ $key }},
      text: "{{ $value }}",
      title: "{{ $value }}",
      selected: true
    });
    @endforeach
  @endif
    // Fill Select options
    $('#{{ $id }}').select2({
      data: data2,
      ajax: {
        url: '/api/v1/tags/selectOptions/',
        dataType: 'json',
        processResults: function (data) {
          // Transforms the top-level key of the response object from 'items' to 'results'
          return {
            results: data
          };
        }
      },
    });

</script>
@endpush
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush