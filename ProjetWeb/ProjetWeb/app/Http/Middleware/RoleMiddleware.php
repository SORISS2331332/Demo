<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Si l'utilisateur n'a pas le rôle, on le redirige (par exemple, vers la page d'accueil)
            return redirect('/');
        }

        return $next($request);
    }
}
