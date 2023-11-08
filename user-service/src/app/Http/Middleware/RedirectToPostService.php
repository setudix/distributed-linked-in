<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToPostService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request, $request->server('REQUEST_URI'),str_replace('/user-service', '', $request->server('REQUEST_URI'),));

        return redirect(env('POST_SERVICE_URL').str_replace('/user-service/', '', $request->server('REQUEST_URI'),));


        // return $next($request);
    }
}
