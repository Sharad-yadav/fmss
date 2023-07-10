<?php

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
