<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function dept(){
        return $this->morphToMany('App\Department', 'deptables');
    }
}
