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
    const AdminBatch = [
        'admin.batch.index',
        'admin.batch.create',
        'admin.batch.edit',
        'admin.batch.show',
    ];
    const AdminSemester =[
        'admin.semester.index',
        'admin.semester.create',
        'admin.semester.edit',
        'admin.semester.show',
    ];
    const AdminSection =[
        'admin.section.index',
        'admin.section.create',
        'admin.section.edit',
        'admin.section.show',
    ];
    const AdminSubject =[
        'admin.subject.index',
        'admin.subject.create',
        'admin.subject.edit',
        'admin.subject.show',
    ];

    const AdminNotice =[
        'admin.notice.index',
        'admin.notice.create',
        'admin.notice.edit',
        'admin.notice.show',
    ];

    const AdminLeave =[
        'admin.leave.index',
    ];
    const AdminSyllabus = [
        'admin.syllabus.index',
        'admin.syllabus.create',
        'admin.syllabus.edit',
        'admin.syllabus.show',
    ];

    const TeacherDashboard = ['teacher.dashboard'];

    const TeacherAssignment =[
        'teacher.assignment.index',
        'teacher.assignment.create',
        'teacher.assignment.edit',
        'teacher.assignment.show',
    ];
    const TeacherRoutine =[
        'teacher.routine.index',
        'teacher.routine.create',
        'teacher.routine.edit',
        'teacher.routine.show',
    ];
    const TeacherNotice =[
        'teacher.notice.index',
    ];
    const TeacherLeave =[
        'teacher.leave.create',
        'teacher.leave.index',
        'teacher.leave.edit',
        'teacher.leave.show',
    ];
    const TeacherNote =[
        'teacher.note.create',
        'teacher.note.index',
        'teacher.note.index',
        'teacher.note.show',
    ];


}
