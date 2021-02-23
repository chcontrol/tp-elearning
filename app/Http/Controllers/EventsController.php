<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::get(['id', 'title', 'discription', 'start', 'end', 'color', 'ref_link', 'course_id', 'note']);

        return Response()->json($data);
    }

    public function index2()
    {
        $data = Event::get(['id', 'title', 'discription', 'start', 'end', 'color', 'ref_link', 'course_id', 'note']);

        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->course_id = $request->course_id;
        $event->discription = $request->discription;
        $event->start = $request->date_start . ' ' . $request->time_start;
        $event->end = $request->date_end;
        $event->ref_link = $request->ref_link;
        $event->note = '1';
        $event->color = $request->color;
        $event->save();

        return redirect('/calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $event = Event::find($id);
        $event->title = $request->title;
        $event->course_id = $request->course_id;
        $event->discription = $request->discription;
        $event->start = $request->date_start . ' ' . $request->time_start;
        $event->end = $request->date_end;
        $event->ref_link = $request->ref_link;
        $event->note = '0';
        $event->color = $request->color;

        if ($event->save())
            return response()->json([
                'status'    =>  201,
                'message'   =>  'บันทึกการแก้ไขสำเร็จ'
            ]);
        return response()->json([
            'status'    =>  503,
            'message'   =>  'SE PRODUJO UN ERROR AL ACTUALIZAR EVENTO'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if ($event == null)
            return Response()->json([
                'message'   =>  'ERROR AL ELIMINAR EVENTO'
            ]);

        $event->delete();

        return Response()->json([
            'message'   =>  'ลบการนัดสอบสำเร็จ'
        ]);
    }
}
