<?php

namespace App\Imports;

use App\Take;
use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class TakesImport implements ToModel, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $stud = Student::where('student_id',$row[0])->first();
        $take = new Take();
        $take->id = $stud->id;
        $take->course_code = $row[1];
        $take->semester = $row[2];
        $take->year = $row[3];
        $take->sec_id = $row[4];
        return $take;
    }

    public function batchSize():int
    {
        return 100;
    }

    public function chunkSize():int
    {
        return 100;
    }


}
