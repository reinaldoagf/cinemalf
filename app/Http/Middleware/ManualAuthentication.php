<?php

namespace Cinema\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class ManualAuthentication
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
        if (!Auth::check()) {
            return Redirect::to('/');
        }
        return $next($request);
    }
}
