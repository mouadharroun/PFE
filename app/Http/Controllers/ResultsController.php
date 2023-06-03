<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index(){
        $exams = Exam::all();
        return view("Teacher.Results.ExamsResults", compact("exams"));
    }

    

}
