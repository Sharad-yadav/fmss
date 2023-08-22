<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Teacher\TeacherController;

class CheckIfTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $teacherController = new TeacherController();
        if(me(null, 'role_id') == RoleConstant::TEACHER_ID) {
            return $next($request);
        }
        return redirect()->back();
    }


        // Now you can use $teacherController to call the controller's methods.

}
