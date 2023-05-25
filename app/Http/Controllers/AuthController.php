<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            //Auth::login($user);
            if (Auth::user()->role === 'teacher') {
                return redirect()->intended('/teacher/dashboard');
            }elseif (Auth::user()->role === 'student') {
                return redirect()->intended('/student/dashboard');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email and password']);

    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function register(Request $request){
        $user = new User;
        $user->name = $request['username'];
        $user->email = $request['email'];
        $password = $request['password'];
        $user->password = Hash::make($password);
        $user->role = $request['role'];
        $user->save();
        //$user->notify(new MaNotification());
        //event(new UserCreated($user));
        
        //Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
        return redirect()->intended('login');
    }
}
