<?php

use App\Constants\RoleConstant;
use Illuminate\Support\Facades\Auth;

/**
 * Get user
 *
 * @param string $guard
 * @return mixed
 */
function me($guard = null, $attribute = null)
{
    if($attribute) {
        return Auth::guard($guard)->user()->{$attribute};
    }
    return Auth::guard($guard)->user();
}

/**
 * Get logged in front user
 *
 *  *
 * @param null $attribute
 * @return mixed
 */
function frontUser($attribute = null)
{
    if ($attribute) {
        return me()->{$attribute};
    }
    return me();
}

/**
 * admin User
 *
 * @return mixed
 */
function adminUser($attribute = null)
{
    if ($attribute) {
        return me('admin')->{$attribute};
    }
    return me('admin');
}

/**
 * @return int|string
 */
function getCurrentGuard() {
    $guards = array_keys(config('auth.guards')) ;
    foreach($guards as $guard){
        if(auth()->guard($guard)->check()){
            return $guard;
        }
    }
}
function getProfileRoute()
{
    if (me(getCurrentGuard(), 'role_id') == RoleConstant::ADMIN_ID) {
        return route('admin.profile.index');
    } elseif (me(getCurrentGuard(), 'role_id') == RoleConstant::TEACHER_ID) {
        return route('teacher.profile.index');
    }elseif(me(getCurrentGuard(), 'role_id')== RoleConstant::STUDENT_ID){
        return route('student.profile.index');
    }
}
function getDashInfo(){
    if(me(getCurrentGuard(),'role_id')== RoleConstant::ADMIN_ID){
        return ('ADMIN || DASHBOARD');
    }
    elseif(me(getCurrentGuard(),'role_id') == RoleConstant::TEACHER_ID){
        return ('TEACHER || DASHBOARD ');
    }
    elseif(me(getCurrentGuard(),'role_id')== RoleConstant::STUDENT_ID){
        return('STUDENT || DASHBOARD');
    }
}

function getTeacherRole() {
    $teacher = \App\Models\Teacher::where('user_id', frontUser('id'))->first();
    if($teacher->is_hod) {
        return \App\Constants\TeacherConstant::HOD_ID;
    }
    elseif ($teacher->is_lab) {
        return \App\Constants\TeacherConstant::LAB_ID;
    }
    return \App\Constants\TeacherConstant::TEACHER_ID;
}
