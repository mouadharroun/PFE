<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


class ExamController extends Controller
{
    public function create(){
        $teacher = auth()->user();
        $courses = $teacher->courses;
       
        return view('Teacher.Exams.AddExam' , ['courses' => $courses]);
        
    }

    public function store(Request $request){
        
        $exam = new Exam;
        $exam->course_id = $request['course'];
        $exam->name = $request['name'];
        $exam->duration = $request['duration'];
        $exam->save();
        session(['messageE'=>'Exam successfuly added !!']); 

        return redirect('/teacher/AddExam');
    } 
}
