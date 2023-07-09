<x-layout.master>

    <div >
        <div class="d-flex justify-content-end gap-1 border rounded-2 py-2 px-1 shadow" style="height:110px;">
            <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold bg-orange-200">
                <span class="fs-3 fw-bold">$500</span>
                <div class='d-flex justify-content-between'>
                    <div class='pt-3'>
                        <span class="bg-white rounded text-orange-200 px-2">+112.23%</span>
                    </div>
                    <div>
                        <span class='d-flex ms-5'>Revenue</span>
                        <span class='d-flex ps-2'>(Last 30 days)</span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold bg-green-200">
                <span class="fs-3 fw-bold">$300</span>
                <div class='d-flex justify-content-between'>
                    <div class='pt-3'>
                        <span class="bg-white rounded text-green-200 px-2">+112.23%</span>
                    </div>
                    <div>
                        <span class='d-flex ms-5'></span>
                        <span class='d-flex ps-2' style="font-size:12px;">Gross Margin</span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold bg-green-200">
                <span class="fs-3 fw-bold">$200</span>
                <div class='d-flex justify-content-between'>
                    <div class='pt-3'>
                        <span class="bg-white rounded text-green-200 px-2">+112.23%</span>
                    </div>
                    <div>
                        <span class='d-flex ms-5'>ROI</span>
                        <span class='d-flex ps-2' style="font-size:12px;">for Vehicle</span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold bg-green-200">
                <span class="fs-3 fw-bold">$500m</span>
                <div class='d-flex justify-content-between'>
                    <div class='pt-3'>
                        <span class="bg-white rounded text-green-200 px-2">+112.23%</span>
                    </div>
                    <div>
                        <span class='d-flex lh-1' style="font-size:10px;">Avg.Rental Rate</span>
                        <span class='d-flex ms-1 mt-2 lh-1' style="font-size:10px;">across fleets</span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold bg-green-200">
                <span class="fs-3 fw-bold">$300m</span>
                <div class='d-flex justify-content-between'>
                    <div class='pt-3'>
                        <span class="bg-white rounded text-green-200 px-2">+112.23%</span>
                    </div>
                    <div class="ps-3">
                        <span class='d-flex' >Annual Gain</span>
                    </div>
                </div>
            </div>

            <div class="border px-2 rounded-3 text-white fw-bold bg-orange-200">
                <div class='d-flex justify-content-between'>
                    <div class='px-2'>
                        <span class="fs-3 fw-bold">$70m</span>
                        <div class='d-flex'>
                            <div class="flex-shrink-0 pt-3">
                                <span class='bg-white px-2 rounded text-orange-200'>+12.6%</span>
                            </div>
                            <div class="flex-grow-1 ms-1">
                                <span class='fw-bold fs-6'>Total Pipeline</span>
                            </div>

                        </div>
                    </div>

                    <div class='ps-3 pt-1'>
                        <span class='d-block bg-green-200' style="font-size:12px;">$70m-$100m (High)</span>
                        <div class='bg-white' style="height:2px;"></div>
                        <span class='d-block' style="font-size:12px;">$40m-$70m (Mid)</span>
                        <div class='bg-white' style="height:2px;"></div>
                        <span class='d-block bg-danger' style="font-size:12px;">$0m-$40m (Low)</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-page-header header="Scheduling"></x-page-header>
    <div class="card">
        <div class="rounded-0 card-body">
            <div class="d-flex">
                    <label for="colFormLabelSm" class="fw-bold" style="font-size:14px;">Schedule For:</label>
                    <div class="ps-2">
                        <select class="form-select form-select-sm" id='search-type'>
                            <option @if(!request()->filled('type') or request()->type != 'driver') selected @endif
                                value="vehicle">Vehicles</option>
                            <option @if(request()->filled('type') and request()->type == 'driver') selected @endif
                                value="driver">Drivers</option>
                        </select>
                    </div>

                <div class="ps-5">
                    <span class="fw-bold" style="font-size:14px;">View:</span>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        @php
                        $dayPeriod = (request()->filled('period') and request()->period == 'day');
                        $weekPeriod = (!request()->filled('period') or request()->period == 'week');
                        $monthPeriod = (request()->filled('period') and request()->period == 'month');
                        @endphp
                        <a href="{{request()->fullUrlWithQuery(['period'=>'day'])}}" @class([ 'btn btn-sm'
                            , 'bg-primary text-white'=> $dayPeriod,
                            'bg-gray-200' => !$dayPeriod,
                            ]) >Day</a>
                        <a href="{{request()->fullUrlWithQuery(['period'=>'week'])}}" @class([ 'btn btn-sm'
                            , 'bg-primary text-white'=> $weekPeriod,
                            'bg-gray-200' => !$weekPeriod,
                            ])>Week</a>
                        <a href="{{request()->fullUrlWithQuery(['period'=>'month'])}}" @class([ 'btn btn-sm'
                            , 'bg-primary text-white'=> $monthPeriod,
                            'bg-gray-200' => !$monthPeriod,
                            ])>Month</a>
                    </div>
                </div>


            </div>

            <div class="float-end">
                <a href="{{route('create_schedule')}}" class='text-decoration-none text-dark float-end'>
                    <i class="fas fa-edit fa-2x"></i>
                </a>
            </div>

            <div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {!!$calendar->show($date)!!}
                        </div>
                        <div class="modal-footer">
                            <a href='{{url()->current()}}' class='btn float-end text-primary'>Today</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class='pt-3'>
                <span class='fs-6 fw-bolder d-flex justify-content-center'>
                    {{carbon(Arr::first($daysInWeek))->format('F
                    d')}}-{{carbon(Arr::last($daysInWeek))->isSameMonth(carbon(Arr::first($daysInWeek))) ?
                    carbon(Arr::last($daysInWeek))->format('d, Y') : carbon(Arr::last($daysInWeek))->format('F d, Y')}}
                </span>
                <div class="table-responsive card">
                    @if($type == 'driver')
                    <x-drivers-schedule :drivers='$result' :daysInWeek='$daysInWeek'></x-drivers-schedule>
                    @else
                    <x-vehicle-schedule :vehicles='$result' :daysInWeek='$daysInWeek'></x-vehicle-schedule>
                    @endif
                </div>
                {{$result->links()}}
            </div>

        </div>


        <div class="fixed-bottom">
            <a class="float-end" href="#" data-bs-toggle="modal" data-bs-target="#calendarModal"><i
                    class="fa-3x fas fa-calendar-alt bg-white text-dark"></i></a>
        </div>


    </div>

    @push('scripts')
    <script type='text/javascript'>
        window.addEventListener("DOMContentLoaded", function() {
            let calendarModal = document.getElementById('calendarModal')

            calendarModal.addEventListener('show.bs.modal', function (event) {
                let week = [...document.querySelector('#currentDate').parentElement.children]
                week.forEach(function (currentValue, currentIndex, listObj) {
                    let date = listObj[currentIndex].children[0];
                    if(!date.classList.contains('bg-warning') && !date.classList.contains('bg-primary')){
                        if(date.text){
                            date.classList.add('bg-warning')
                        }
                    }
                })
            });
        })
    
    </script>
    @endpush
</x-layout.master>