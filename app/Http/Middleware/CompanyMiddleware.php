<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('company')->check()) {
                $user = Auth::guard('company')->user();
                if ($user->status == 2) {
                    return $next($request);
                }
                return redirect()->route('company_login')->with('error', 'Account not active');
        }

        return redirect()->route('company_login')->with('error', 'Session expired. Please login again');
    }

}
