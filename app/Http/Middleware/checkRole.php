<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {  if ($role == 'formateur' && auth()->user()->role_id != 1) {
        return redirect()->route('dashboard');
    }
    if ($role == 'admin' && auth()->user()->role_id != 3) {
        return redirect()->route('dashboard');
    }

    if ($role == 'apprenant' && auth()->user()->role_id != 2 && auth()->user()->role_id != 3) {
        return redirect()->route('formateur.index');
    }
    if ($role == 'apprenant' && auth()->user()->role_id != 1  && auth()->user()->role_id != 2) {
        return redirect()->route('admin.index');
    }

        return $next($request);
    }
}
