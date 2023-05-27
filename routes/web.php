<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;

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
Route::get('/login', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'teacher') {
            return redirect('/teacher/dashboard');
        } elseif ($user->role === 'student') {
            return redirect('/student/dashboard');
        }
    }
    return view('Login.Login');
})->name('login');

Route::post('/login' , [AuthController::class , 'login']);

Route::get('/Register', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
     return view('Login.Register'); 
});

Route::post('/Register', [AuthController::class , 'register'] );

Route::get('/logout', [AuthController::class , 'logout'] );

Route::middleware('auth')->group(function(){

    Route::prefix('teacher')->group(function(){

        Route::get('/dashboard', function () {return view('Teacher.Dashboard');});
        Route::get('/AddCourse', [CourseController::class , 'create']);
        Route::post('/AddCourse', [CourseController::class , 'store']);
        Route::get('/ShowCourses', function () {return view('Teacher.Courses.ShowCourses');});
        Route::get('/AddExam', function () {return view('Teacher.Exams.AddExam');});
        Route::get('/ShowExams', function () {return view('Teacher.Exams.ShowExams');});
        Route::get('/AddMCQuestion', function () {return view('Teacher.Questions.AddMCQuestion');});
        Route::get('/AddSCQuestion', function () {return view('Teacher.Questions.AddSCQuestion');});
        Route::post('/AddSCQuestion', [QuestionController::class , 'store']);

    });

    Route::prefix('student')->group(function(){
        Route::get('/dashboard', function () {return view('Student.Dashboard');});

    });

});




