<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use App\Choice;
use App\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bigQuestions = BigQuestion::where('status', 1)->get();
        return view('admin.index', compact('bigQuestions'));
    }

    public function big_add(Request $request)
    {
        // $request->validate(
        //     [
        //         'name' => 'required',
        //         // 'valid' => 'boolean',
        //     ],
        //     [
        //         'name.required' => '※大問の入力は必須です。',
        //         // 'valid.required'  => 'チェックボックスを記入してください',
        //     ]
        // );
        $data = $request->all();
        $create_big_question = BigQuestion::insertGetId([
            'name' => $data['name'],
            'status' => 1,
        ]);
        return view('admin.question.display', ['id' => $create_big_question]);
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $img = $request->file('image');
        $path = $img->store('img', 'public');
        $create_question = Question::insertGetId([
            'big_question_id' => $id,
            'status' => 1,
            'image' => $path
        ]);
        foreach ($data['name'] as $key => $name) :
            $number = $key + 1;
            if ($data['valid'] == '選択肢' . $number) :
                $valid = 1;
            else :
                $valid = 0;
            endif;
            $create_choice = Choice::insertGetId([
                'question_id' => $create_question,
                'name' => $name,
                'valid' => $valid,
            ]);
        endforeach;
        return redirect()->route('admin.question.display', ['id' => $id]);
    }

    public function big_delete(Request $request, $big_question_id)
    {
        $inputs = $request->all();
        // dd($inputs);
        // 論理削除なので、status=2
        BigQuestion::where('id', $big_question_id)->update(['status' => 2]);
        return redirect('admin');
    }

    public function delete(Request $request, $question_id)
    {
        $inputs = $request->all();
        // dd($inputs);
        // 論理削除なので、status=2
        Question::where('id', $question_id)->update(['status' => 2]);
        return redirect()->route('admin.question.display', ['id' => 2]);
    }

    public function editDisplay($question_id)
    {
        $question = Question::where('id', $question_id)->get();
        $choice = Choice::where('question_id', $question_id)->get();
        // dd($question);
        return view('admin.question.edit', compact('question', 'choice'));
    }

    public function edit(Request $request, $question_id)
    {
        $inputs = $request->all();

        $img = $request->file('image');
        $path = Question::where('id', $question_id)->first()->image;
        if (isset($img)) {
            \Storage::disk('public')->delete($path);
            $path = $img->store('img', 'public');
            Question::where('id', $question_id)->update(['image' => $path]);
        }
        $choices = Choice::where('question_id', $question_id)->get();
        foreach ($choices as $key => $choice) :
            $number = $key + 1;
            if ($inputs['valid'] == '選択肢' . $number) :
                $valid = 1;
            else :
                $valid = 0;
            endif;
            Choice::where('id', $choice['id'])->update(['name' => $inputs["name$key"]]);
            Choice::where('id', $choice['id'])->update(['valid' => $valid]);
        endforeach;
        return redirect()->route('admin.question.display', ['id' => 2]);
    }

    public function display(Request $request,$id)
    {
        // $request->validate(
        //     [
        //         'name' => 'required',
        //         // 'valid' => 'boolean',
        //     ],
        //     [
        //         'name.required' => '※大問の入力は必須です。',
        //         // 'valid.required'  => 'チェックボックスを記入してください',
        //     ]
        // );
        $questions = Question::where('big_question_id', $id)->where('status', 1)->get();
        $choices = Choice::get();
        return view('admin.question.display', compact('id', 'questions', 'choices'));
    }
}
