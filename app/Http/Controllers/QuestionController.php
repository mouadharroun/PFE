<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'Exam' => 'required',
        'question_text' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'correct_option' => 'required',
    ]);

    $examId = $request['Exam'];
    $questionText = $request['question_text'];
    $options = [
        $request['option1'],
        $request['option2'],
        $request['option3'],
        $request['option4'],
    ];
    $correctOption = $request['correct_option'];

    $question = new Question;
    $question->exam_id = $examId;
    $question->question_text = $questionText;
    $question->save();

    foreach ($options as $key => $optionText) {
        $option = new Option;
        $option->question_id = $question->id;
        $option->option_text = $optionText;
        $option->is_correct = ($key + 1) == $correctOption;
        $option->save();
    }

    return redirect('/teacher/AddSCQuestion');
}

}
