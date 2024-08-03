<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login dengan memeriksa session
        if (!$request->session()->has('id_role')) {
            return redirect('/login')->withErrors('Anda harus login terlebih dahulu.');
        }

        $id_role = $request->session()->get('id_role');

        // Cek role berdasarkan session
        if ($id_role == 1) {
            if ($role == 'owner' && $id_role != 1) {
                return redirect('/kasir/dashboard')->withErrors('Anda tidak memiliki hak akses sebagai owner.');
            }
        }

        if ($id_role == 2) {
            if ($role == 'kasir' && $id_role != 2) {
                return redirect('/owner/dashboard')->withErrors('Anda tidak memiliki hak akses sebagai kasir.');
            }
        }

        return $next($request);
    }
}
