<?php

namespace App\Imports;

use App\Instructor;
use App\User;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;

class InstructorsImport implements ToModel
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

        $inst = new Instructor();
        $inst->id = $user->id;
        $inst->title = $row[4];
        $inst->first_name = $row[5];
        $inst->last_name = $row[6];
        $inst->instructor_id = $row[7];
        $inst->gender = $row[8];
        $inst->user()->save($user);
        
        return $inst;
    }
}
