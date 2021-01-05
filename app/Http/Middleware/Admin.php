<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
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

        if ($this->permise())
            
            return $next($request);

        return response()->json(['Message' => 'No tiene permiso para entrar aquí']);
    }

    private function permise()
    {
        return Auth::user()->isAdmin() == true;
    }    

}
