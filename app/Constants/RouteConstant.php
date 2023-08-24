<?php


namespace App\Constants;


class RouteConstant
{
    const AdminDashboard = ['admin.dashboard'];
    const AdminUser = [
        'admin.teacher.index',
        'admin.teacher.create',
        'admin.teacher.import',
        'admin.teacher.edit',
        'admin.teacher.show',
        'admin.student.index',
        'admin.student.create',
        'admin.student.edit',
        'admin.student.show',
    ];
    const AdminTeacher = [
        'admin.teacher.index',
        'admin.teacher.create',
        'admin.teacher.import',
        'admin.teacher.edit',
        'admin.teacher.show',
    ];
    const AdminStudent = [
        'admin.student.index',
        'admin.student.create',
        'admin.student.edit',
        'admin.student.show',
    ];
    const AdminFaculty = [
        'admin.faculty.index',
        'admin.faculty.create',
        'admin.faculty.edit',
        'admin.faculty.show',
    ];

}
