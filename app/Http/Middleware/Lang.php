<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      if ($request->session()->has('lang')) {
        app()->setLocale(session()->get('lang'));
      }
      else {
        app()->setLocale('en');

      }
        return $next($request);
}
}