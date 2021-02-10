<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
  
class DemoController extends Controller
{
    
    public function importExportView()
    {
        // UsersExport
    //    return view('import');
       return view(theme('dashboard.import'));

    }

    
   
    public function export(Request $slug) 
    {
        $users = User::where('id', '!=', auth()->id())->get('id','name');

        // return Excel::download(new UsersExport(1), 'users.csv');
        // return (new UsersExport(1))->download('invoices.xlsx');
        // return (new UsersExport)->forYear(2018)->download('invoices.xlsx');

        // return (new UsersExport($id->id))->download('invoices.xlsx');
        return Excel::download(new UsersExport($slug->slug), 'MttRegistrations.xlsx');


    }
   
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return redirect()->back();
    }
}
