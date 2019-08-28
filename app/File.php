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
}
