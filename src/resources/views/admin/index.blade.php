<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link rel="stylesheet" href="{{ asset('/style/style.css') }}">
</head>

<body>
    @component('components.header')
    @endcomponent
    <div class="main">
        <h2>大問追加</h2>
        <form action="{{ route('big_add')}}" method="post" enctype="multipart/form-data">
        @csrf
            <input type="text" name="name">
            <input type="submit" value="追加">
        </form>
        @foreach($bigQuestions as $bigQuestion)
        <div class="big_box">
            <h2>{{$bigQuestion['name']}}</h2>
            <div class="big_link">
                <div class="big_link_see">
                    <a href="/quiz/ {{$bigQuestion->id}}"><img src="\storage\iconmonstr-magnifier-4-240.png" alt="">閲覧</a>
                </div>
                <div class="big_link_edit">
                    <a href="/admin/question/display/ {{$bigQuestion->id}}"><img src="\storage\iconmonstr-pencil-7-240.png" alt="">編集</a>
                </div>
                <div class="big_link_delete">
                    <a href="#"><img src="\storage\iconmonstr-trash-can-9-240.png" alt="">削除</a>
                </div>
            </div>
        </div>
        @endforeach
        <script src="{{ asset('/js/main.js') }}"></script>
    </div>
</body>

</html>