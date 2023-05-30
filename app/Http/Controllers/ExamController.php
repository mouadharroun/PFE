<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Course::all();
        return view('Teacher.Exams.AddExam', ['exams' => $exams]);
    }
    public function store(Request $request){
        
        $course = new Exam;
        $course->course_id = $request['course'];
        $course->name = $request['name'];
        $course->duration = $request['duration'];
        $course->save();
        session(['messageC'=>'Course successfuly added !!']);

        //session::put('messageC','Course successfuly added !!');
        return redirect('/teacher/AddExam');
    }
}
