<?php

namespace App\Imports;

use App\Course;
use App\Department;
use Maatwebsite\Excel\Concerns\ToModel;

class CoursesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $course = new Course();
        $course->name = $row[0];
        $course->course_code = $row[1];
        $department = Department::where('name', $row[2])->first();
        $department->courses()->save($course);
        return $course;
    }
}
