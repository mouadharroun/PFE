<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function showExam($id){
        $exam = Exam::find($id);
        return view("Teacher.Exams.ShowExam", compact('exam'));
    }
}
