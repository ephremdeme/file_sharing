<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instructor;

class File extends Model
{

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
