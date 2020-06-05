<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        #en este caso agregaremos un filtro de IP
        $ip = $request->ip();
        if ($ip == '192.168.10.1') {
            return $next($request);
        }
        return redirect('/');
    }
}
