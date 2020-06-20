<?php

namespace App\Http\Middleware;

use Closure;

class WhitelistIpAccess
{
    public $whiteIps = ['192.168.1.1', '127.0.0.1'];
        
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->ip(), $this->whiteIps)) {
            return response('你的 IP 位址無法進入。', 200)
                  ->header('Content-Type', 'text/plain');
        }
    
        return $next($request);
    }
}
