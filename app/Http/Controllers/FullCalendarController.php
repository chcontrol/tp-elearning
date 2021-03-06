<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use App\Models\Booking;
use Redirect,Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FullCalendarController extends Controller
{
    public function index()
	{
		$user = Auth::user();

		if(request()->ajax())
		{
			$start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
			$end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
			$data = Booking::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
			return Response::json($data);
		}
		//return view('fullcalendar');
		$title = __t('dashboard');
        $chartData = null;
        // $categories = Category::parent()->get();
        $courses = Course::publish()->get();




		$courses = Course::query();

		$courses = $courses->where('is_featured', 1);








        $courses = Course::whereSlug(1)->with('sections', 'sections.items', 'sections.items.attachments')->first();

        return view(theme('dashboard.calendar'), compact('title', 'chartData','courses'));

	}
	public function create(Request $request)
	{
		$insertArr = [ 'title' => $request->title,
		'start' => $request->start,
		'end' => $request->end
		];
		$booking = Booking::insert($insertArr);
		return Response::json($booking);
	}
	public function update(Request $request)
	{
		$where = array('id' => $request->id);
		$updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
		$booking  = Booking::where($where)->update($updateArr);
		return Response::json($booking);
	}
	public function destroy(Request $request)
	{
		$booking = Booking::where('id',$request->id)->delete();
		return Response::json($booking);
	}
}

?>