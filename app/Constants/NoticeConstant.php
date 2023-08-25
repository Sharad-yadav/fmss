<?php

namespace App\Constants;

class NoticeConstant
{
    const ALL_ID =1;
    const TEACHER_ID=2;
    const STUDENT_ID=3;
    const ALL = "All";
    const TEACHER = "Teacher";
    const STUDENT = "Student";


    const NOTICE_FOR = [
        [
            'name'  => self::ALL,
            'id'    => self::ALL_ID
        ],
        [
            'name'  => self::TEACHER,
            'id'    => self::TEACHER_ID
        ],
        [
            'name'  => self::STUDENT,
            'id'    => self::STUDENT_ID
        ]
    ];
}
