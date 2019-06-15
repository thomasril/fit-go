<?php

namespace App\Http\Middleware\owner;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasProperty
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
        if(Auth::user()->property == null) {
            return redirect()->route('insertProperty');
        }
        return $next($request);
    }
}
