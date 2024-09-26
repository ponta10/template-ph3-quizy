<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>aaaa</title>
     <link rel="stylesheet" href="{{ asset('/style/style.css') }}">
</head>

<body>
     @component('components.header')
     @endcomponent
     <div class="home">
          <a href="../../"><img src="\storage\iconmonstr-home-thin-240.png" alt="" class="back">管理画面TOPに戻る</a>
          <form action="{{ route('store', ['id' =>  $id ]) }}" method="post" enctype="multipart/form-data">
               @csrf
               <h2>問題追加</h2>
               <button class="create" type="button">追加する</button>
               <div class="add">
                    <div class="add_img">
                         <p>画像</p>
                         <input type="file" name="image" class="file">
                         <img id="preview" class="img-thumbnail h-25 w-25 mb-3" width="600px" height="450px" src="/storage/図1.png">
                    </div>
                    <div class="add_select">
                         <p>選択肢1</p>
                         <input type="text" name="name[0]">
                         <input type="radio" name="valid" value="選択肢1">
                         <p>選択肢2</p>
                         <input type="text" name="name[1]">
                         <input type="radio" name="valid" value="選択肢2">
                         <p>選択肢3</p>
                         <input type="text" name="name[2]">
                         <input type="radio" name="valid" value="選択肢3">
                         <input type="submit" value="追加する" class="submit">
                    </div>
               </div>
          </form>
          <div class="quiz_area">
               @if(isset($questions))
               @foreach($questions as $question)
               <div class="quiz">
                    <h2 class="question">{{ $loop -> index + 1 }}. この地名はなんて読む？</h2>
                    <div class="quiz_edit">
                         <a href="{{ route('editDisplay', [ 'question_id' => $question['id'] ]) }}"><img src="/storage/iconmonstr-pencil-13-240.png" alt="" class="trash_can"></a>
                         <form action="{{ route('delete', [ 'question_id' => $question['id'] ]) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="image" src="/storage/iconmonstr-trash-can-9-240.png" class="trash_can">
                         </form>
                    </div>
                    <img src="/storage/{{ $question->image }}" class="quiz_img">
                    <ul>
                         @foreach ($question['choices'] as $choice)
                         @if($choice['valid'] == 1)
                         <li class="choice valid" id="answer_{{$question['id']}}_{{$loop -> index + 1}}" name="answer_{{$question['id']}}" onclick="choice({{ $question['id'] }},{{ $loop -> index + 1 }},{{ $question['choices']->where('question_id', $question['id'])->where('valid', true)->first()->id - (($question->id - 1) * 3)}})">
                              {{ $choice['name'] }}
                         </li>
                         @else
                         <li class="choice" id="answer_{{$question['id']}}_{{$loop -> index + 1}}" name="answer_{{$question['id']}}" onclick="choice({{ $question['id'] }},{{ $loop -> index + 1 }},{{ $question['choices']->where('question_id', $question['id'])->where('valid', true)->first()->id - (($question->id - 1) * 3)}})">
                              {{ $choice['name'] }}
                         </li>
                         @endif
                         @endforeach
                    </ul>
               </div>
               @endforeach
               @endif
          </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
     <script src="{{ asset('/js/admin.js') }}"></script>
</body>

</html>