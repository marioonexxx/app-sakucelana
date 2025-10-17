<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Manajer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // ROLE ADMIN

        if($userRole == 0)
        {
            return redirect()->route('dashboard');
           
        }

        // ROLE KASIR
        if($userRole == 1)
        {
            return redirect()->route('kasir.dashboard');
            
        }
        // ROLE MANAJER
        if($userRole == 2)
        {
            return $next($request);
            
        }

        // ROLE KEUANGAN
        if($userRole == 3)
        {
            return redirect()->route('keuangan.dashboard');
            
        }

         // ROLE INVENTARIS
        if($userRole == 4)
        {
            return redirect()->route('inventaris.dashboard');
        }
    }
}
