<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link rel="stylesheet" href="{{ asset('/style/style.css') }}">
</head>

<body>
    <div class="main">
        @foreach($questions as $question)
        <div class="quiz">
            <h2 class="question">{{ $loop -> index + 1 }}. この地名はなんて読む？</h2>
            <img src="/storage/{{ $question->image }}" class="image">
            <ul>
                @foreach ($question['choices'] as $choice)
                <li class="choice" id="answer_{{$question['id']}}_{{$loop -> index + 1}}" name="answer_{{$question['id']}}" onclick="choice({{ $question['id'] }},{{ $loop -> index + 1 }},{{ $question['choices']->where('question_id', $question['id'])->where('valid', true)->first()->id - (($question->id - 1) * 3)}})">
                    {{ $choice['name'] }}
                </li>
                @endforeach
            </ul>
            <p id="answerarea_{{$question['id']}}" class="answerarea">
                <span id="answertext_{{$question['id']}}"></span><br>
                <span id=result>正解は「{{$question->choices->where('question_id', $question->id)->where('valid', true)->first()->name}}」です！</span>
            </p>
        </div>
        @endforeach
        <script src="{{ asset('/js/main.js') }}"></script>
    </div>
</body>

</html>