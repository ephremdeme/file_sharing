<?php

namespace App\Imports;

use App\Student;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new User();
        $user->username = $row[1];
        $user->email = $row[2];
        $user->password = Hash::make($row[3]);
        $user->save();

        $stud = new Student();
        $stud->id = $user->id;
        $stud->first_name = $row[4];
        $stud->last_name = $row[5];
        $stud->student_id = $row[6];
        $stud->gender = $row[7];
        $stud->user()->save($user);

        return $stud;
    }
}
