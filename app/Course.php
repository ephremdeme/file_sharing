<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User')
                ->using('App\CourseUser');
    }

    public function files(){
        return $this->hasMany('App\File');
    }

}
