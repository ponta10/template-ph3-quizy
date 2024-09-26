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
          <form action="{{ route('edit', [ 'question_id' => $question[0]['id'] ]) }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="file" name="image" >
               <img id="preview" class="img-thumbnail h-25 w-25 mb-3" width="600px" height="450px" src="/storage/{{ $question[0]->image }}">
               @foreach ($question[0]['choices'] as $key => $choice)
               @if($choice['valid'] == 1)
               <input type="text" value="{{ $choice['name'] }}" class="choice text" id="answer_{{$question[0]['id']}}_{{$loop -> index + 1}}" name="name{{$key}}">
               <input type="radio" value="選択肢{{$loop -> index + 1}}" name="valid" checked>
               @else
               <input type="text" value="{{ $choice['name'] }}" class="choice text" id="answer_{{$question[0]['id']}}_{{$loop -> index + 1}}" name="name{{$key}}">
               <input type="radio" value="選択肢{{$loop -> index + 1}}" name="valid">
               @endif
               @endforeach
               <input type="submit" value="更新">
          </form>
          <script src="{{ asset('/js/main.js') }}"></script>
          <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
     <script src="{{ asset('/js/admin.js') }}"></script>
     </div>
</body>

</html>