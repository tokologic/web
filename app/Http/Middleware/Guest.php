<?php


namespace App\Http\Middleware;


class Guest
{
    public function handle($request, \Closure $next)
    {
        if (\Sentinel::check())
            abort(404);

        return $next($request);
    }
}
