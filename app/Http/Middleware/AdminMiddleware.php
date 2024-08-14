<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $a = ['admin', 'admin_dpupk', 'admin_keuangan', "admin_kendaraan", "admin_asrama", "admin_alat_barang", "admin_gedung_lap", "admin_layanan"];
        if (!in_array(auth()->user()->level, $a)) {
            abort(401);
        }

        return $next($request);
    }
}
