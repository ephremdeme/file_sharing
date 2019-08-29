<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instructor;

class File extends Model
{
    //
    public function author()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function users(){
        return $this->hasManyThrough('App\User', 'App\Course' );
    }
}
