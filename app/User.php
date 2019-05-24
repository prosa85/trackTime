<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

use Auth;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','tracking_hours'
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

    public function timetrack(){
        return $this->hasMany('App\Timetrack');
    }

    public function timetrackForWeek($week){
        return $this->hasMany('App\Timetrack')->where('week',$week)->get();

    }
    public function timetrackForLastWeek(){
        $week = Carbon::now()->weekOfYear -1;
        // dump($week);
        return $this->timetrackForWeek($week);
    }

    public static function isAdmin(){
        return Auth::user()->role ==3;
    }

    public function isTracking(){
        return $this->where('tracking_hours', 1)->get();
    }
}
