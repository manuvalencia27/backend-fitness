<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Middleware para saber si el usuario es admin o cliente y no dejar ingresar a las rutas del crud
        if (Auth::user()->role == 1) {
            return $next($request);
        }

        return Redirect::action([\App\Http\Controllers\ProductController::class, 'shop']);
    }
}
