<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function addQuestion(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'Exam' => 'required',
        'question_text' => 'required|string',
        'name.*' => 'required|string',
        'correct_option' => 'required',
        'point' => 'required|numeric',
    ]);

    // Create the question
    $question = Question::create([
        'exam_id' => $validatedData['Exam'],
        'question_text' => $validatedData['question_text'],
        'point' => $validatedData['point'],
    ]);

    // Create the options
    for ($i = 0; $i < 4; $i++) {
        $isCorrect = $validatedData['correct_option'] == 'option'.($i + 1);

        Option::create([
            'question_id' => $question->id,
            'option_text' => $validatedData['name'][$i],
            'is_correct' => $isCorrect,
        ]);
    }

    // Redirect or return a response
    return redirect()->back()->with('success', 'Question added successfully!');
}
}
