<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Course;

class CourseController extends Controller
{
    public function create(){
        $groups = Group::all();
        return view('Teacher.Courses.AddCourse' , ['groups' =>$groups]);
    }

    public function store(Request $request){
        
        $course = new Course;
        $course->name = $request['name'];
        $course->teacher_id = $request['teacher'];
        $course->group_id = $request['group'];
        $course->save();
        session(['messageC'=>'Course successfuly added !!']);

        //session::put('messageC','Course successfuly added !!');
        return redirect('/teacher/AddCourse');
    }
}
