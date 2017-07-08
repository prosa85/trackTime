<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timetrack extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timetracks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','start','end','week'];

    protected $appents = ['hours','user'];

    public function getStartAttribute($value){
        return Carbon::createFromTimestamp($value)->toDateTimeString();

    }
    public function getEndAttribute($value){
        return Carbon::createFromTimestamp($value)->toDateTimeString();

    }

    public function getHoursAttribute(){
        $start = Carbon::createFromTimestamp($this->attributes['start']);
        $end = Carbon::createFromTimestamp($this->attributes['end']);

        return $start->diffInMinutes($end)/60 ;
    }

    public function scopeForUser($query){
        $user = \Auth::user();
        return $user->role == 1? $query->where('user_id',$user->id):$query;
    }
    public function scopeForWeek($query,$week){
        
        return $query->where('week',$week);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
