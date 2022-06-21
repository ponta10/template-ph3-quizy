<?php

namespace App\Http\Controllers;

use App\Question;
use App\Choice;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index($id) {
        $questions = Question::where('big_question_id', $id)->get();
        $choices = Question::find(2)->choices;
        $test = Choice::get();
        return view('quiz.id', compact('questions', 'choices','test'));
    }
}
