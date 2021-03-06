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
    protected $appends =['hours', 'companyName'];

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
    protected $fillable = ['user_id','start','end','week','commit', 'company'];

    protected $appents = ['hours','user'];

    public function getStartAttribute($value){
        return Carbon::createFromTimestamp($value)->toDayDateTimeString();
    }
    public function getCompanyNameAttribute(){
        switch ($this->attributes["company"]){
            case 1: return "DSL";
            case 2: return "Altruist";

            return "error";
        }
    }

    public function getEndAttribute($value){
        return Carbon::createFromTimestamp($value)->toDayDateTimeString();

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
    public function scopeForWeek($query,$week, $user){
        $now = Carbon::now();
        return $query->where([['week',$week],['user_id',$user->id]])->whereYear('created_at', $now->year);
    }

    public function scopeForPagos($query){
        
        return $query->get()->keyBy('week')->groupBy('user_id');
    }

    public function scopeForCompany($query, $company){

        return $query->where([['company', $company],['paid', false]]);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
