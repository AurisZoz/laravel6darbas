<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KeiksmazodziaiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response= $next($request);

        $content=$response->getContent();
        $content=str_replace( '[[tel]]', '+370645485454', $content);
        $content=str_replace( 'žirkė', 'ž***ė', $content);
        $response->setContent($content);
        return $response;
    }
}
