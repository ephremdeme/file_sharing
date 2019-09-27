<?php

namespace App\Imports;

use App\Department;
use Maatwebsite\Excel\Concerns\ToModel;

class DepartmentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dept = new Department();
        $dept->name = $row[0];
        $dept->building = $row[1];
        $dept->schooll = $row[2];

        return $dept;
    }
}
