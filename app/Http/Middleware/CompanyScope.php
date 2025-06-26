<?php

namespace App\Http\Middleware;

use Closure;

class CompanyScope
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()) {
            // Establecer el ID de la empresa en la sesión solo si hay usuario autenticado
            session(['company_id' => auth()->user()->company_id]);
        }

        return $next($request);
    }

}
