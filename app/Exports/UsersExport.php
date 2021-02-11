<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;

class UsersExport implements FromCollection, WithHeadings,WithHeadingRow
{
    use Exportable;

    


    // public function collection()
    // {
    //     $sql = "SELECT * from users  WHERE 1=1";
    //     $getStudents = DB::select(DB::raw($sql));

    //     $users = User::where('id', '!=', auth()->id())->get('id','name');
    //     return User::where('id', '!=', auth()->id())->get('id','name');

    // }

    protected $slug;

    function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function collection()
    {
        // return User::where('id', '!=', $this->id)->get(['id', 'name','email']);

        // $sql = "SELECT id from users  WHERE gender is not null";
        // $getStudents = DB::select(DB::raw($sql));
        // array_splice($getStudents, count($getStudents) - 1, 1);
        // echo print_r($getStudents);
        // array_splice($getStudents, count($getStudents) - 1, 1);

        // $CallModel = new User();
        // $aa = $CallModel->getGetRatingAttribute2();
        // $object = (object)$aa;
        // echo gettype($object);

        // echo json_encode($object);

        // echo json_encode(User::where('id', '!=', $this->id)->get(['id']));

        // echo gettype(User::where('id', '!=', $this->id)->get(['id']));
        // echo User::where('id', '!=', $this->id)->get(['id', 'name','email']);
        
        return  DB::table('attempts')
        ->where('courses.slug', '=', $this->slug)
        ->join('users', 'users.id', '=', 'attempts.user_id')
        ->join('courses', 'courses.id', '=', 'attempts.course_id')
        ->select('users.id', 'users.name', 'users.email', 'attempts.total_scores', 'attempts.course_id')
        ->get();
        // return $this->hasManyThrough(Deployment::class, Environment::class);

    }

    public function headingRow(): int
    {
        return 2;
    }

    public static function beforeSheet(BeforeSheet $event){
        $event->sheet->appendRows(array(
            array('test1', 'test2'),
            array('test3', 'test4'),
            //....
        ), $event);
    }

    public function headings(): array
    {
      
        return ["id", "name", "email", "total scores", "course"];
    }




    public function registerEvents(): array
    {
        return [
            BeforeExport::class  => function(BeforeExport $event) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    
                $event->sheet->styleCells(
                    'A1:W1',
                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => 'FFFF0000'],
                            ],
                        ]
                    ]
                );
            },
        ];
    }
}
