<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;

class File extends Model
{
    //
    public function author()
    {
        return $this->belongsTo(Teacher::class);
    }
}
