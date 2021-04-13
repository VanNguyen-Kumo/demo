<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'Email',
            'Security code',
            'Video type',
            'token key'
        ];
    }
    public function collection()
    {
       // return User::all();
        return collect(User::getUser());
    }
}
