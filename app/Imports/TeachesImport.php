<?php

namespace App\Imports;

use App\Teach;
use App\Instructor;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $inst = Instructor::where('instructor_id',$row[0])->first();
        $teach = new Teach();
        $teach->id = $inst->id;
        $teach->course_code = $row[1];
        $teach->semester = $row[2];
        $teach->year = $row[3];
        $teach->sec_id = $row[4];
        return $teach;
    }
}
