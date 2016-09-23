<?php


class ContadorMiddleware
{
    public function __invoke($request, $response, $next)
    {
        
        return $next($request, $response);
    }
}
?>