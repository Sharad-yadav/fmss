<?php


namespace App\Constants;


class FacultyConstant
{
    const COMP = 'Computer';
    const CIVIL = 'Civil';
    const ARCH = 'Architecture';

    const COMP_ID = 1;
    const CIVIL_ID = 2;
    const ARCH_ID = 3;

    const faculties = [
        [
            'name' =>   self::COMP,
            'id'   =>   self::COMP_ID
        ],
        [
            'name' =>   self::CIVIL,
            'id'   =>   self::CIVIL_ID
        ],
        [
            'name' =>   self::ARCH,
            'id'   =>   self::ARCH_ID
        ],

    ];
}
