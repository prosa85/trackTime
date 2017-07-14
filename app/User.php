<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUsers(){
        return static::where('role','<=',2);
        return static::where('role','<=',Auth::user()['role']);
    }

    public static function isAdmin(){
        return Auth::user()->role ==3;
    }
}
