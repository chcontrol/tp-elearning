<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class UsersExport implements FromCollection
{

    public function collection()
    {
        $sql = "SELECT * from users  WHERE 1=1";
        $getStudents = DB::select(DB::raw($sql));

        $users = User::where('id', '!=', auth()->id())->get('id','name');
        // $users = User::select('select * from users where id = ?', [1]);

        // $users = User::table('users')
        //     ->selectRaw('count(*) as user_count, status')
        //     ->where('status', '<>', 1)
        //     ->groupBy('status')
        //     ->get();
        
        return User::where('id', '!=', auth()->id())->get('id','name');
        
    }


    
}
