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
    /**
     * @OA\Get(
     *     path="/api/dashboard/schedules",
     *     description="Fetches all schedules",
     *     @OA\Parameter(
     *         name="X-XSRF-TOKEN",
     *         in="header",
     *         description="for CORS protection (Refer to the 'sanctum/csrf-cookie' endpoint)",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         description="Filters the result using period within this date",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid input or incomplete form entry"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful; returns an object containing relevant information to be displayed to the user"
     *     )
     * )
     */
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

        return request()->ajax() ? $data : view('schedules', $data);
    }

    public function createSchedulePage()
    {
        $drivers = Driver::all();
        $clients = Client::all();
        $vehicles = Vehicle::all();

        return view('create-schedule', ['drivers'=>$drivers, 'clients'=>$clients, 'vehicles'=>$vehicles]);
    }

    /**
     * @OA\Post(
     *     path="/dashboard/create-schedule",
     *     description="Creates a new schedule",
     *     @OA\Parameter(
     *         name="X-XSRF-TOKEN",
     *         in="header",
     *         description="for CORS protection (Refer to the 'sanctum/csrf-cookie' endpoint)",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="service",
     *         in="query",
     *         description="What service is this schedule for (can be anything you define)",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="vehicle",
     *         in="query",
     *         description="The vechicle (represented by its ID) to assign to this schedule",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="driver",
     *         in="query",
     *         description="The driver (represented by its ID) to assign to this schedule",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="client",
     *         in="query",
     *         description="The client (represented by its ID) to assign to this schedule",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="start_date",
     *         in="query",
     *         description="A valid date representing when this schedule should kick off",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="start_time",
     *         in="query",
     *         description="A valid time representing the time in the start_date when this schedule should kick off",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         description="A valid date representing the end of this schedule",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="end_time",
     *         in="query",
     *         description="A valid time representing the time in the end_date when this schedule should end",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="pickup",
     *         in="query",
     *         description="The pickup location/address",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="dropoff",
     *         in="query",
     *         description="The drop-off location/address",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid input or incomplete form entry"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful; returns a string containing a success message."
     *     )
     * )
     */
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
