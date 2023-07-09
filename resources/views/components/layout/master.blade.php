<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <x-meta-head></x-meta-head>
</head>

<body class='bg-white'>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 home-color" >
                
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 sticky-top">
                    <div class='p-5 border-bottom'>
                        <img class='img-thumbnail rounded-circle' style="max-height:500px;" src="{{asset('storage/dp/'.request()->user()->dp)}}" />
                        <span class='fw-bold pt-3 d-flex justify-content-center'>
                            {{request()->user()->name['firstname']}} {{request()->user()->name['lastname']}}
                        </span>
                        <span class='text-gray-200 d-flex justify-content-center'>{{ucwords(request()->user()->role)}}</span>

                        <a href="{{route('home')}}" class="nav-link font-weight-bold text-light align-middle px-0 pt-4">
                            <i class="fs-5 fas fa-house-user"></i> <span class="ms-1 d-none d-sm-inline">Home </span>
                        </a>
                    </div>
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link font-weight-bold text-light align-middle px-0">
                                <i class="fs-6 fas fa-share-nodes"></i> <span class="ms-1 d-none d-sm-inline">Business Development</span>
                                <span class="fs-6 fas fa-caret-down"></span>
                            </a>
                        </li>

                        <li class="nav-item pt-2">
                            <a href="#reservation" class="nav-link font-weight-bold text-light align-middle px-0 toggle-caret" role="button"  data-bs-toggle="collapse" aria-expanded="false">
                                <span class='border-start border-4'>
                                <i class="fs-6 fas fa-tag ps-2"></i> <span class="ms-1 d-none d-sm-inline">Reservations</span>
                                <span class="fs-6 fas fa-caret-down caret"></span>
                                </span>
                            </a>
                            <div class="collapse" id='reservation'>
                                <a href="#" class="text-white text-decoration-none list-group-item-action d-flex pt-2 border-start border-4">
                                    <span class="ms-1 d-none d-sm-inline">Bookings</span>
                                </a>

                                <a href="{{route('schedules')}}" @class([
                                    'list-group-item-action d-flex pt-2 text-decoration-none', 
                                    'text-primary rounded-3'=> (Route::currentRouteName() == 'schedules'),
                                    'text-white' => (Route::currentRouteName() != 'schedules'),
                                    ]) 
                                    @if(Route::currentRouteName() == 'schedules') style='background-color:#dee2e6;' @endif>
                                    <span class="ms-1 d-none d-sm-inline">Scheduling</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item pt-2">
                            <a href="#" class="nav-link font-weight-bold text-light align-middle px-0">
                                <i class="fs-6 fas fa-coins"></i> <span class="ms-1 d-none d-sm-inline">Operations</span>
                                <span class="fs-6 fas fa-caret-down"></span>
                            </a>
                        </li>

                        <li class="nav-item pt-2">
                            <a href="#" class="nav-link font-weight-bold text-light align-middle px-0">
                                <i class="fs-6 fas fa-file-alt"></i> <span class="ms-1 d-none d-sm-inline">Infrastructure</span>
                                <span class="fs-6 fas fa-caret-down"></span>
                            </a>
                        </li>

                        <li class="nav-item pt-2">
                            <a href="#" class="nav-link font-weight-bold text-light align-middle px-0">
                                <i class="fs-6 fas fa-coins"></i> <span class="ms-1 d-none d-sm-inline">Reports &amp; Tools</span>
                                <span class="fs-6 fas fa-caret-down"></span>
                            </a>
                        </li>

                        <li class="nav-item pt-2">
                            <a href="#" class="nav-link font-weight-bold text-light align-middle px-0">
                                <i class="fs-6 fas fa-cog"></i> <span class="ms-1 d-none d-sm-inline">Setup</span>
                                <span class="fs-6 fas fa-caret-down"></span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-light align-middle px-0 pre-run" data-caption="Are You Sure You Want To logout?"
                                data-classname="logout-form" data-bc="admin_logout"
                                href="{{route('logout')}}">
                                <i class="fas fa-sign-out-alt"></i><span class="ms-1 d-none d-sm-inline">Log Out</span></a>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10 col-xl-10">
                <x-dashboard-nav></x-dashboard-nav>

                {{ $slot }}

            </div>

        </div>
    </div>
    @stack('scripts')
</body>

</html>