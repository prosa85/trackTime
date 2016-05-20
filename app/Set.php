<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sets';

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
    protected $fillable = ['workex_id:integer', 'weigth:integer', 'reps:integer'];
}
