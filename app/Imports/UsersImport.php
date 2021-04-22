<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Video;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $video_id=Video::inRandomOrder()->first();
        return new User([
            'email'=>$row['email'],
            'security_code'=>$row['security_code'],
            'video_id'=>$video_id->id,
        ]);
    }
}
