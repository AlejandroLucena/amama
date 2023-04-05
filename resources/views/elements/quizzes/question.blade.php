<div
    class="inline-flex items-center mt-3 w-full"
    data-answer="answer_{{ $answer->id }}">
        <input
            class="form-radio h-5 w-5 text-green-700"
            type="radio" id="answer_{{ $answer->id }}" name="answer" value="{{ $answer->id }}">
        <label
            class="ml-2 text-gray-700"
            for="answer_{{ $answer->id }}">
            {{ $answer->title }}
        </label>
</div>
