<?php

namespace App\Http\Middleware;

use App\Models\UrlLogs;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Logs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $url_logs = new UrlLogs();

        $url_logs->user_id = auth()->id();

        $url_logs->url = urldecode($request->input('url'));

        $url_logs->ip_address = $request->ip();

        $url_logs->time = now();

        $url_logs->save();
        
        return $next($request);
    }
}
