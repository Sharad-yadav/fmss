<?php

namespace App\Constants;

class LeaveConstant
{
    const SICK_ID =1;
    const HOME_ID =2;

    const SICK= "Sick";
    const HOME= "Home";



    const LEAVE_TYPE = [
        [
            'name'  => self::SICK,
            'id'    => self::SICK_ID
        ],
        [
            'name'  => self::HOME,
            'id'    => self::HOME_ID
        ]

    ];
}
