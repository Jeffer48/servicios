<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {   
        //DD($roles);
        if (!auth()->check()) return redirect('login');
        $user_rol = auth()->user()->id_tipo;

        switch($user_rol){
            case 1:
                $user_rol = "admin";
                break;
            case 2:
                $user_rol ="operador";
                break;
        }

        if($user_rol === "admin") return $next($request);

        if($roles === $user_rol) return $next($request);

        return redirect('/');
    }
}
