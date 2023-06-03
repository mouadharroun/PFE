<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\MultipleChoiceOption;
use App\Models\Question;
use App\Models\SingleChoiceOption;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function showExam($id)
    {
        $exam = Exam::with('questions.options')->find($id);
        return view("Teacher.Exams.ShowExam", compact('exam'));
    }
    

    public function addTextQuestion(Request $request)
    {

         $question = new Question();
         $question->question_text = $request->input('text-question');
         $question->question_type = 'text';
          $question->exam_id = 1;
         $question->save();
 
         if ($question) {
            return response()->json([
                'message' => 'Question added successfully',
            ]);
        } else {
            // Return a response indicating an error
            return response()->json([
                'error' => 'Failed to add the question',
            ], 500);
        }
        
    }

    public function addTrueFalseQuestion(Request $request)
    {
        
        $questionText = $request->input('true-false-question');
        $isCorrect = $request->input('true-false-option') === 'true';

        $question = new Question();
        $question->question_text = $questionText;
        $question->is_correct = $isCorrect;
        $question->question_type = 'true_false';
        $question->exam_id = 1; 
        $question->save();

    
        return response()->json([
            'message' => 'Question added successfully',
        ]);
    }

    public function addSCQuestion(Request $request)
    {
        
       
       /*  $questionText = $request->input('s-options-question');
        $optionTexts = $request->input('choice-option');
        $correctOptionIndex = $request->input('correct-option');
       
    
        $question = new Question();
        $question->exam_id = 1; 
        $question->question_text = $questionText;
        $question->question_type = 'single_choice';
        $question->save();


        foreach ($optionTexts as $key => $optionText) {
            $option = new SingleChoiceOption();
            $option->question_id = $question->id;
            $option->option_text = $optionText;
            $option->is_correct = ($key == $correctOptionIndex);
            $option->save();
        } */

        
        return response()->json(['message' => 'Question saved successfully']);
    }
    public function addMCQuestion(Request $request)
    {
        $questionText = $request->input('multiple-choice-question');
        $options = $request->input('multiple-choice-option');
        $correctAnswers = $request->input('correct-answer');

    
        $question = new Question();
        $question->question_text = $questionText;
        $question->question_type = 'multiple_choice';
        $question->exam_id = 1;
        $question->save();
        
        if(isset($options)){
            foreach ($options as $key => $optionText) {
                $option = new MultipleChoiceOption();
                $option->option_text = $optionText;
                $option->is_correct = false;
                $option->question_id = $question->id;
                $option->save();
            }
        }

        //--------- removing the 'on' from the array
        if (isset($correctAnswers)) {
            $filteredCorrectAnswers = array_filter($correctAnswers, function ($value) {
                return $value !== 'on';
            });
        
            foreach ($filteredCorrectAnswers as $key => $optionText) {
                $option = new MultipleChoiceOption();
                $option->option_text = $optionText;
                $option->is_correct = true;
                $option->question_id = $question->id;
                $option->save();
            }
        }
        
        return response()->json([
            'message' => 'Question added successfully',
        ]);
    }



    public function index()
    {
        $exams = Exam::all();
        return view('Teacher.Exams.ShowExams', ['exams' => $exams]);
    }
}
