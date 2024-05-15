<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    protected function redirectTo()
    {
        switch (auth()->user()->level) {
            case 'customer':
                $redirectTo = "/";
                break;
            default:
                $redirectTo = "/admin";
                break;
        }

        return $redirectTo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return method_exists($this, "redirectTo") ?
                    redirect($this->redirectTo()) : redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
