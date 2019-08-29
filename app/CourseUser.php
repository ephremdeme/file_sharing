<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseUser extends Pivot
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function files(){
        return $this->hasManyThrough('App\File', 'App\Course');
    }
    
}