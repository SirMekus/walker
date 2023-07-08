<x-layout.master>
    
    <x-page-header header="Create Schedule"></x-page-header>
<div class="card">
<div class="rounded-0 card-body">
    <form class="row" method="post" id='form' action="{{route('create_schedule.post')}}" role="search">
        <div class="col-12">
            <label class="fw-bold">Name of Service</label>
            <input type="text" class="form-control form-control-lg borderless-input" autocomplete name="service" />
        </div>

        <div class="col-12 row p-3">
            <div class='col-6'>
                <label class="fw-bold">Start Date</label>
                <input type="date" class="form-control form-control-lg borderless-input" autocomplete name="start_date" />
            </div>
            <div class='col-6'> 
                <label class="fw-bold">Start Time</label>
                <input type="time" class="form-control form-control-lg borderless-input" autocomplete name="start_time" />
            </div>
        </div>

        <div class="col-12 row p-3">
            <div class='col-6'>
                <label class="fw-bold">End Date</label>
                <input type="date" class="form-control form-control-lg borderless-input" autocomplete name="end_date" />
            </div>
            <div class='col-6'> 
                <label class="fw-bold">End Time</label>
                <input type="time" class="form-control form-control-lg borderless-input" autocomplete name="end_time" />
            </div>
        </div>

        <div class="col-12 p-3">
            <label for="colFormLabelSm" class="fw-bold">Vehicle</label>
            <select class="form-select form-select-lg" name='vehicle' >
                @foreach($vehicles as $vehicle)
                <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                @endforeach
              </select>
        </div>

        <div class="col-12 p-3">
            <label for="colFormLabelSm" class="fw-bold">Driver</label>
            <select class="form-select form-select-lg" name='driver'>
                @foreach($drivers as $driver)
                <option value="{{$driver->id}}">{{$driver->name['firstname']}} {{$driver->name['lastname']}}</option>
                @endforeach
              </select>
        </div>

        <div class="col-12 p-3">
            <label for="colFormLabelSm" class="fw-bold">Client</label>
            <select class="form-select form-select-lg" name='client'>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name['firstname']}} {{$client->name['lastname']}}</option>
                @endforeach
              </select>
        </div>

        <div class="col-12 p-3">
            <label class="fw-bold">Pickup Location</label>
            <input type="text" class="form-control form-control-lg borderless-input" autocomplete name="pickup" />
        </div>

        <div class="col-12 p-3">
            <label class="fw-bold">Dropoff Location</label>
            <input type="text" class="form-control form-control-lg borderless-input" autocomplete name="dropoff" />
        </div>

        <div class="col-12 p-3">
            <input class="btn btn-primary btn-lg w-100" type="submit" value="Create" />
        </div>
    </form>

</div>
</div>
</x-layout.master>