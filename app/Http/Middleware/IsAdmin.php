<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request -> user() -> type == 'admin' && $request -> user()!= null){
            return $next($request);
        }else{
            session()->flash('error', 'You should have admin user type to make changes.');

            return redirect()->back();
        }
    }
}
