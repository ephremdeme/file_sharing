<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instructor;

class File extends Model
{
    //
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function users(){
        return $this->hasManyThrough('App\User', 'App\Course' );
    }

    public function section(Type $var = null)
    {
        # code...
    }
}
