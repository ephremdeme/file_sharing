<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    public function students(){
        return $this->morphedByMany('App\Students', 'sectionable');
    }

    public function instructors(){
        return $this->morphedByMany('App\Instructor', 'sectionable');
    }
}
