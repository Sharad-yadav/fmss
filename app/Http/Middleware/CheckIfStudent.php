<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class CheckIfStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(me(null, 'role_id') == RoleConstant::STUDENT_ID) {
            return $next($request);
        }
        return redirect()->back();
    }
}
