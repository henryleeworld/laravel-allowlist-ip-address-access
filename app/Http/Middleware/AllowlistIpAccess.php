<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowlistIpAccess
{
    public $allowedIps = ['192.168.1.1', '127.0.0.1'];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array($request->ip(), $this->allowedIps)) {
            return response(__('Your IP address is inaccessible.'), 200)
                  ->header('Content-Type', 'text/plain');
        }
        return $next($request);
    }
}
