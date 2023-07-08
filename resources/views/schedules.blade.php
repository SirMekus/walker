<x-layout.master>

    <x-page-header header="Scheduling"></x-page-header>
    <div class="card">
        <div class="rounded-0 card-body">
            <div class="d-flex">
                <form class="d-flex" method="get" action="{{url()->current()}}" role="search">
                    <label for="colFormLabelSm" class="fw-bold" style="font-size:14px;">Schedule For:</label>
                    <div class="ps-2">
                        <select class="form-select form-select-sm" id='search-type'>
                            <option @if(!request()->filled('type') or request()->type != 'driver') selected @endif value="vehicle">Vehicles</option>
                            <option @if(request()->filled('type') and request()->type == 'driver') selected @endif value="driver">Drivers</option>
                        </select>
                    </div>
                </form>

                <div class="ps-5">
                    <span class="fw-bold" style="font-size:14px;">View</span>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-sm">Day</button>
                        <button type="button" class="btn btn-primary btn-sm">Week</button>
                        <button type="button" class="btn btn-primary btn-sm">Month</button>
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
                    {{carbon(Arr::first($daysInWeek))->format('F d')}}-{{carbon(Arr::last($daysInWeek))->isSameMonth(carbon(Arr::first($daysInWeek))) ? carbon(Arr::last($daysInWeek))->format('d, Y') : carbon(Arr::last($daysInWeek))->format('F d, Y')}}
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
{{-- 
    @push('scripts')
    <script type='text/javascript'>
        window.addEventListener("DOMContentLoaded", function() {
            var calendarModal = document.getElementById('calendarModal')
            let search = document.querySelector('#search-type');

            search.addEventListener('change', function(event){
                let value = event.currentTarget.value;
                console.log(new URL(location.href+'?type='+value).href)
                //location.href = new URL(location.href+'?type='+value).href
            })
            
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
@endpush --}}
</x-layout.master>