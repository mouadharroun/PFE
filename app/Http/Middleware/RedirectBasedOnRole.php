<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* $user = Auth::user();
        
        foreach ($roles as $role) {
            if ($user && $user->role === $role) {
                return $next($request);
            }
        }

        if ($user->role === 'student') {
            return redirect('/student/dashboard');
        } elseif ($user->role === 'teacher') {
            return redirect('/teacher/dashboard');
        }
        
        abort(403); */
    }
}
