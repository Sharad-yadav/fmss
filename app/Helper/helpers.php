<?php

use App\Constants\RoleConstant;
use App\Constants\TeacherConstant;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
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

function getAuthTeacher($attribute = null) {
    $user = frontUser()->load('teacher');
    $teacher = $user->teacher;
    if ($attribute) {
        return $teacher->{$attribute};
    }
    return $teacher;
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
function getActiveClass(array $routes, $parent=false) {
    if(in_array(getCurrentRouteName(),$routes)) {
        if($parent) {
            return 'kt-menu__item--open';
        }
        return 'kt-menu__item--active';
    }
    return '';
}

function getCurrentRouteName() {
    return request()->route()->getName();
}

/**
 * @return mixed
 */
function getSelectedFaculty($facultyId)
{
    return app(\App\Models\Faculty::class)->where('id', $facultyId)->get(['id', 'name as text']);
}

/**
 * @return mixed
 */
function getSelectedSemester($semesterId)
{
    return app(Semester::class)->where('id', $semesterId)->get(['id', 'name as text']);
}

/**
 * @return mixed
 */
function getSelectedSubject($subjectId)
{
    return app(Subject::class)->where('id', $subjectId)->get(['id', 'name as text']);
}
/**
 * @return mixed
 */
function getSelectedSection($sectionId)
{
    return app(Section::class)->where('id', $sectionId)->get(['id', 'name as text']);
}

function getStudentData()
{
    if(me(getCurrentGuard(),'teacher_id') == TeacherConstant::HOD_ID){
        return function ($row) {
            $params = [
                'is_edit' => true,
                'is_delete' => true,
                'is_show' => true,
                'route' => 'admin.student.',
                'url' => 'admin/student',
                'row' => $row,
            ];
            return view('backend.datatable.action', compact('params'));
    };

 }elseif(me(getCurrentGuard(),'role_id') == RoleConstant::ADMIN_ID){
    return
        function ($row) {
            $params = [
                'is_edit' => true,
                'is_delete' => true,
                'is_show' => true,
                'route' => 'admin.student.',
                'url' => 'admin/student',
                'row' => $row,
            ];
            return view('backend.datatable.action', compact('params'));
        };
 };
}
