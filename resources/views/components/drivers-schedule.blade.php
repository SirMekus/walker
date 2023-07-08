@props(['drivers', 'daysInWeek'])

<table class="table">
    <thead>
        <tr>
            <th class="px-5 ps-5 border-end border-2">
                <span class='pe-5'>Drivers</span>
            </th>

            @foreach($daysInWeek as $day)
            <th class="px-5 ps-5">{{carbon($day)->format('F d')}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
        <tr class='border-bottom-3'>
            <td class='border-end border-2'>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="img-thumbnail" width="100" height="100"
                            src="{{asset('storage/dp/'.$driver->dp)}}" />
                    </div>
                    <div class="flex-grow-1 ms-1">
                        <span class='fw-bold fs-6'>{{$driver->name['firstname']}} {{$driver->name['lastname']}}</span>
                    </div>
                </div>
            </td>

            @foreach($driver->schedules as $schedule)
            @foreach($daysInWeek as $day)

            @if($schedule->start_date->isSameDay($day))
            <td class="px-5" colspan="{{$schedule->start_date->diffInDays($schedule->end_date)+1}}">
                <a href="{{route('schedule_overview', ['id'=>$schedule->id])}}"
                    style="background-color:#7e9ff47d;"
                    class="px-2 rounded-3 d-block text-decoration-none text-dark open-as-modal">
                    <span class='d-flex d-block fw-bold'>{{$schedule->vehicle->name}}
                        {{$schedule->driver->name['lastname']}}</span>
                    <span class='d-flex d-block'>{{$schedule->client->name['firstname']}} </span>
                    <span class='d-flex d-block'>{{$schedule->client->company}} </span>
                </a>
            </td>

            @else
            <td class="px-5">
                {{null}}
            </td>
            @endif

            @endforeach
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>