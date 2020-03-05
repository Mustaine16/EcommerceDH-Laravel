<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class verificarAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $usuario = Auth::user();

        if($usuario && $usuario->email == 'admin@admin.com'){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
