<?php

namespace App\Http\Controllers;

use App\Question;
use App\Choice;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index($id) {
        $questions = Question::where('big_question_id', $id)->where('status' , 1)->get();
        $choices = Choice::get();
        // foreach($questions as $question):
        //     $choice = $choices->where('question_id', $question->id);
        // endforeach;
        return view('quiz.id', compact('questions','choices'));
    }
}
