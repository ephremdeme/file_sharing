<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instructor;
class Department extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function instructors(){
        return $this->morphedByMany(Instructor::class, 'deptables');
    }

    public function students(){
        return $this->morphedByMany('App\Student' , 'deptables');
    }

    public function courses(){
        return $this->hasMany('App\Course', 'dept_name', 'name');
    }

}
