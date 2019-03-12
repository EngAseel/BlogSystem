<?php

namespace App\Http\Middleware;

use Closure;

class UpdateGender
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->gender==0){
            return \response()->json(['error'=>'please insert a gender'],402);
        }
        return $next($request);
    }
}
