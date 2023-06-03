<?php

namespace App\Http\Controllers;

use App\Models\MultipleChoiceOption;
use App\Models\SingleChoiceOption;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
  public function deleteQuestion($id){

    $question = Question::find($id);

        if (!$question) {
            return response()->json(['error' => 'Question not found'], 404);
        }

        // Delete the question
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully']);
    }

}
    
    

