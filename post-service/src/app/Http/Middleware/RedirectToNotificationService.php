<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToNotificationService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->server('REQUEST_URI'));
        return redirect(env('NOTIF_SERVICE_URL').str_replace('/notifications', '', $request->server('REQUEST_URI'),));
        
        
    }
}