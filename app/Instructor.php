<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;

class Instructor extends Model
{
    //
    public function files(){
        return $this->hasMany(File::class);
    }

    public function dept(){
        return $this->morphToMany('App\Department', 'deptables');
    }

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    public function teaches()
    {
        return $this->hasMany('App\Teach', 'id', 'id');
    }

}
