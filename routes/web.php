<?php

use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
///login & Register

Route::get('/', function () {
    return view('/interface');
});





Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('Login.Login');
})->name('login');

Route::post('/login' , [AuthController::class , 'login']);

Route::get('/Register', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
     return view('Login.Register'); 
})->name('Register');

Route::post('/Register', [AuthController::class , 'register'] );

Route::get('/logout', [AuthController::class , 'logout'] );


Route::middleware('auth')->group(function(){

    Route::prefix('teacher')->group(function(){
        
        
        Route::post('/addSCQuestion', [ExamController::class, 'addSCQuestion']);
        Route::get('/dashboard', function () {return view('Teacher.Dashboard');});
        Route::get('/AddCourse', [CourseController::class , 'create']);
        Route::post('/AddCourse', [CourseController::class , 'store']);
        Route::get('/ShowCourses', function () {return view('Teacher.Courses.ShowCourses');});
        // exams related routes
        Route::get('/AddExam', function () {return view('Teacher.Exams.AddExam');});
        Route::get('/ShowExams', [ExamController::class , 'index']);
        Route::get('/ShowExam/{id}', [ExamController::class, 'showExam']);
        Route::put('/updateExam/{id}', [ExamController::class, 'updateExam'])->name("exams.update");
    
        Route::get('/AddTextQuestion', function () {return view('Teacher.Questions.AddTextQuestion');});
        Route::post('/AddTextQuestion', [ExamController::class, 'addTextQuestion']);
        Route::post('/addTrueFalseQuestion', [ExamController::class, 'addTrueFalseQuestion']);
        Route::post('/addMCQuestion', [ExamController::class, 'addMCQuestion']);
        //Route::post('/addSCQuestion', [ExamController::class, 'addSCQuestion']);
        Route::DELETE('/deleteQuestion/{id}', [QuestionController::class, 'deleteQuestion']);
        Route::get('/examsResults',[ResultsController::class, 'index']);

       
        
    });


    });

    Route::prefix('student')->group(function(){
        Route::get('/dashboard', function () {return view('Student.Dashboard');});
        Route::get('/showStudentExams', function () {return view('Student.Dashboard');});

    });






