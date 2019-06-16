<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class ScheduleController extends Controller
{
    public function getScheduleArrayBySportIdAndDate() {
        $sportid = request()->sportid;
        $date = request()->date;
        $sport = Sport::find($sportid);
        $property = $sport->property;
        $startTime = strtotime($property->open_hour);
        $endTime = strtotime($property->close_hour);
        $header = [];
        $schedule = [];
        for($time = $startTime; $time < $endTime; $time+=3600) {
            $header[] = date('H:i', $time) . ' - ' . date('H:i', $time + 3600);
        }
        foreach($sport->fields as $i=>$field) {
            $schedules = $field->schedules()->whereDate('date', $date)->get();
            for($time = $startTime; $time < $endTime; $time+=3600) {
                $data = $schedules->where('time', date('H:i:s', $time))->first();
                if($data != null) {
                    $schedule[$i][] = [
                        'booked' => true,
                        'data' => $data
                    ];
                } else {
                    $schedule[$i][] = [
                        'booked' => false,
                        'time' => date('H:i:s', $time),
                        'field' => $field
                    ];
                }
            }
        }
        $today = Schedule::where('date', $date)->withTrashed()->with('user')->get();
        return compact('header', 'schedule', 'date', 'today');
    }

    public function insertSchedule(Request $request) {
        if(Auth::user()->role->name == "Owner") {
            $schedule = new Schedule();
            $schedule->time = $request->time;
            $schedule->date = $request->date;
            $schedule->customer_id = Auth::id();
            $schedule->field_id = $request->field;
            $schedule->name = $request->name;
            $schedule->save();
        } else if(auth::user()->role->name == "Customer") {
            $schedule = new Schedule();
            $schedule->time = $request->time;
            $schedule->date = $request->date;
            $schedule->customer_id = Auth::id();
            $schedule->field_id = $request->field;
            $schedule->name = Auth::user()->name;
            $schedule->save();

            $nexmo = app('Nexmo\Client');
            $nexmo->message()->send([
                'to' => $schedule->field->sport->property->user->phone_number,
                'from' => 'Fitgo',
                'text' => "$schedule->name telah memesan tempat olahraga ". $schedule->field->sport->masterSport->name." pada tanggal ". $schedule->date. " di jam ". $schedule->time,
            ]);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );

            $pusher = new Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                $options
            );

            $data['message'] = "$schedule->name telah memesan tempat olahraga ". $schedule->field->sport->masterSport->name." pada tanggal ". $schedule->date. " di jam ". $schedule->time;
            $pusher->trigger('reminder-channel', 'reminder-event', $data);
        }
    }

    public function deleteOne($id) {
        Schedule::find($id)->delete();
    }

    public function bookingHistoryPage() {
        $schedules = Schedule::withTrashed()->orderBy('time', 'desc')->orderBy('date', 'desc')->get();
        return view('customer.history', compact('schedules'));
    }
}
