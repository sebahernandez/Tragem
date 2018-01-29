<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
{
    
    public function handle($request, Closure $next)
    {
        if (auth()->check() && $request->user()->isAdmin()) {
            return $next($request);
        }

        if ($request->ajax()) {
            return new JsonResponse([
                            'msj' => 'DISCULPE LAS MOLESTIAS!!<br>NO POSEE EL ROL PARA REAILIZAR ÉSTA ACTIVIDAD!!!'
                        ],422);
        }
        
        return redirect()->route('home');
    }
}
