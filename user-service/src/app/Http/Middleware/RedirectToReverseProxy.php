<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToReverseProxy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request, $request->server('REMOTE_ADDR'), env('NGINX_IP_ADDR'));

        // if ($request->server('SERVER_ADDR') == env('NGINX_IP_ADDR')){
        //     return redirect('http://localhost:8080/'.$request->getRequestUri());
        // }
        return $next($request);
    }
}
