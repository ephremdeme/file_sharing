<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;

class Teacher extends Model
{
    //
    public function files(){
        return $this->hasMany(File::class);
    }

    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

}
