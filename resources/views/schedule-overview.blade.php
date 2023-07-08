<div>
    <div>
        <div class='card-title border-bottom border-3 border-primary pb-3'>
            <span class='fw-bold fs-5'>Schedule Overview</span>
            <span class='float-end'>
                <a class="text-dark rounded-2 border px-1 py-1 " href="#"><i class="fas fa-edit"></i></a>
                <a class="text-dark rounded-2 border px-1 py-1 " href="#"><i class="fas fa-trash"></i></a>
                <a class="text-dark rounded-2 border px-1 py-1" href="#"><i class="fas fa-cancel"></i></a>
            </span>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img class="img-thumbnail" src="{{asset('storage/vehicles/'.$schedule->vehicle->image)}}" />
                </div>
                <div class="flex-grow-1 ms-1 mt-4">
                    <span class='fw-bold fs-6'>{{$schedule->vehicle->name}} {{$schedule->vehicle->model}}</span>

                    <span class='d-block'>{{$schedule->vehicle->description}}</span>

                    <span @class(['d-block fw-bold', 'text-danger'=> !empty($schedule->vehicle->status),
                        'text-success' => empty($schedule->vehicle->status),
                        ])>
                        {{empty($schedule->vehicle->status) ? "Great Condition" : $schedule->vehicle->status}}
                    </span>
                </div>
            </div>

            <div class='border-bottom border-4'>
            <div class='hstack mt-3 gap-5'>
                <div>
                    <span class='fw-bold'>Driver:</span>
                </div>
                <div>
                    <span class='ms-4'>{{$schedule->driver->name['firstname']}} {{$schedule->driver->name['lastname']}}</span>
                </div>
            </div>

            <div class='hstack mt-3 gap-5 pt-2'>
                <div>
                    <span class='fw-bold'>Customer:</span>
                </div>
                <div>
                    <span>{{$schedule->client->name['firstname']}}</span>
                </div>
            </div>

            <div class='hstack mt-3 gap-5 pt-2'>
                <div>
                    <span class='fw-bold'>Service:</span>
                </div>
                <div>
                    <span class='ms-3'>{{$schedule->service}}</span>
                </div>
            </div>

            <div class='hstack mt-3 gap-5 pt-2'>
                <div>
                    <span class='fw-bold'>Start Date:</span>
                </div>
                <div>
                    <span>{{$schedule->start_date->format('d-m-Y h:i A')}}</span>
                </div>
            </div>

            <div class='hstack mt-3 gap-5 pt-2'>
                <div>
                    <span class='fw-bold'>End Date:</span>
                </div>
                <div>
                    <span>{{$schedule->end_date->format('d-m-Y h:i A')}}</span>
                </div>
            </div>

            <div class='hstack mt-3 gap-5 pt-2'>
                <div>
                    <span class='fw-bold'>Pickup Location:</span><br/>

                    <span class='pt-2'>{{$schedule->pickup_location}}</span>
                </div>
            </div>

            <div class='hstack mt-3 gap-5 pt-2'>
                <div>
                    <span class='fw-bold'>Dropoff Location:</span><br/>

                    <span class='pt-2'>{{$schedule->drop_off_location}}</span>
                </div>
            </div>

            <div class="form-group mt-3 pb-2">
                <textarea class="form-control-lg form-control" style="border-radius:10px;" col="2" rows="2" id="body"
                    placeholder="Note..."></textarea>
            </div>
        </div>

        <div class='d-flex justify-content-center'>
            <span>Created By: {{$schedule->user->name['firstname']}} {{$schedule->user->name['lastname']}}</span>

            <span class='ps-5'>Last Edit By:</span>
        </div>

        </div>
    </div>