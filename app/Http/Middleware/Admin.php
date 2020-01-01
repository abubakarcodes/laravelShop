<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if ( ! $this->isAdmin()) {
            return redirect('/')->with('errors' , 'sorry you cannot access admin');
        }

        return $next($request);
    }

    public function isAdmin()
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->isAdmin()) {
                return true;
            }
        }

        return false;
    }
}
