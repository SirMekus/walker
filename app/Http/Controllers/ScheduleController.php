<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Client;
use App\Models\Schedule;
use App\MyClass\Calendar;
use Illuminate\Support\Arr;

class ScheduleController extends Controller
{
    public function schedules(Calendar $calendar)
    {
        request()->validate([
            'date' => ['bail', 'nullable', 'date'],
            ]);

        $scheduleForThisDay = carbon(request()->date);

        $day = $scheduleForThisDay->toDateString();

        $daysInWeek = generateDaysInAWeek(request()->date);
        
        $class = (request()->filled('type') and request()->type == 'driver') ? Driver::class : Vehicle::class;

        $result = $class::with(['schedules'=>function($query) use ($scheduleForThisDay){
            $query->whereRaw('Date(start_date) BETWEEN ? and ?', [$scheduleForThisDay->startOfWeek()->toDateString(), $scheduleForThisDay->endOfWeek()->toDateString()]);
        }])
        ->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'result'=>$result,
            'date'=>$day,
            'calendar'=>$calendar,
            'daysInWeek'=>$daysInWeek,
            'type'=> (request()->filled('type') and request()->type == 'driver') ? 'driver' : 'vehicle'
        ];

        return view('schedules', $data);
    }

    public function createSchedulePage()
    {
        $drivers = Driver::all();
        $clients = Client::all();
        $vehicles = Vehicle::all();

        return view('create-schedule', ['drivers'=>$drivers, 'clients'=>$clients, 'vehicles'=>$vehicles]);
    }

    public function createSchedule()
    {
        request()->validate([
            'service' => ['bail', 'required', 'string'],
            'vehicle' => ['bail', 'required', 'integer', "exists:".Vehicle::class.',id'],
            'driver' => ['bail', 'required', 'integer', "exists:".Driver::class.',id'],
            'client' => ['bail', 'required', 'integer', "exists:".Client::class.',id'],
            'start_date' => ['bail', 'required', 'date', "after_or_equal:today"],
            'start_time' => ['bail', 'required', 'string'],
            'end_date' => ['bail', 'required', 'date', "after_or_equal:start_date"],
            'end_time' => ['bail', 'required', 'string'],
            'pickup' => ['bail', 'required', 'string'],
            'dropoff' => ['bail', 'required', 'string']
        ]);

        $startDate = carbon(request()->start_date.' '.request()->start_time)->toDateTimeString();
        
        $endDate = carbon(request()->end_date.' '.request()->end_time)->toDateTimeString();

        $duration = carbon($startDate)->diffInDays($endDate);

        $endOfWeek = endOfWeek($startDate);

        //Remaining days of the week for this start date
        $diffInDays = carbon($startDate)->diffInDays($endOfWeek->toDateTimeString());

        if($duration > $diffInDays)
        {
            return response("You exceeded the period in this current week as there is/are ".$diffInDays." day(s) to the end of the week as you can only book for the duration of the remaining part of the week. Please book for another week.", 422);
        }

        //We check if the vehicle will be free within this time period
        if(Schedule::whereRaw('? BETWEEN start_date and end_date', [$startDate])->where('vehicle_id', request()->vehicle)->where('driver_id', request()->driver)->exists())
        {
            return response('Vehicle is currently or will be in use within this time period', 422);
        }

        Schedule::create([
            'service'=>request()->service,
            'start_date'=>$startDate,
            'end_date'=>$endDate,
            'vehicle_id'=>request()->vehicle,
            'driver_id'=>request()->driver,
            'client_id'=>request()->client,
            'pickup_location'=>request()->pickup,
            'drop_off_location'=>request()->dropoff,
            'user_id'=>request()->user()->id,
        ]);

        return response("Schedule has been successfully fixed");
    }

    public function scheduleOverview()
    {
        $schedule = Schedule::findOrFail(request()->id);

        return view('schedule-overview', ['schedule'=>$schedule]);
    }
}
