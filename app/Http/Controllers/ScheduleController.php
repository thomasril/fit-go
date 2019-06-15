<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Sport;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }

    public function getScheduleArrayBySportIdAndDate() {
        $sportid = request()->sportid;
        $date = request()->date;
        $sport = Sport::find($sportid);
        $property = $sport->property;
        $startTime = strtotime($property->open_hour);
        $endTime = strtotime($property->close_hour);
        $data = [];
        $header = [];
        $schedule = [];
        $fieldCount = $sport->fields()->count();
        for($time = $startTime; $time <= $endTime; $time+=3600) {
            $header[] = date('H:i', $time) . ' - ' . date('H:i', $time + 3600);
        }

        foreach($sport->fields as $i=>$field) {
            $schedules = $field->schedules()->whereDate('date', $date)->get();
            for($time = $startTime; $time <= $endTime; $time+=3600) {
                $data = $schedules->where('time', date('H:i:s', $time))->first();
                if($data != null) {
                    $schedule[$i][] = [
                        'booked' => true
                    ];
                } else {
                    $schedule[$i][] = [
                        'booked' => false
                    ];
                }
            }
        }
        return compact('header', 'schedule');

    }
}
