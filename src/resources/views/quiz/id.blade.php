<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <div class="main">
        @foreach($questions as $question)
            <div class="quiz">
                <h1>{{ $loop -> index + 1 }}. この地名はなんて読む？</h1>
                <img src="/img/{{ $question->image }}">
                <ul>
                    @foreach ($choices->where('question_id', $question->id) as $choice)
                        <li 
                        >{{ $choice->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        <script src="{{ asset('/js/main.js') }}"></script>
    </div>
</body>

</html>