<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        if (!Auth::check()) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect('/login');
        }
        $roles_string = implode($roles);
        $role = Auth::user()->role;

        // Auth::logout();

        // request()->session()->invalidate();
        // request()->session()->regenerateToken();

        // dd($role, $roles_string);

        // dd($role,$roles_string);
        if ($role != $roles_string) {
        // Jika pengguna tidak memiliki peran yang sesuai, kembalikan kode akses ditolak

        if($role == 'customer') {
            return redirect('/customer-dashboard');
        }
        else{
            return redirect('/merchant-dashboard');
        }
        }
        

        return $next($request);
    }
}
