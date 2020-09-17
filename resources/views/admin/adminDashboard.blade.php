<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    

</head>
<body>
    <div id="app">

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Bus Booking</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>{{ Auth::user()->first_name }}</p>
                    <li class=@yield('adminDashboardclass')>
                        <a href="{{ route('adminDashboard') }}">
                            <i class="glyphicon glyphicon-home"></i>
                            Dashboard
                        </a>
                    </li>
       
                    <li class=@yield('agentClass')>
                        <a href="#agentSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Agent
                        </a>
                        <ul class="collapse list-unstyled" id="agentSubmenu">
                            <li><a href="{{ route('agent.index') }}">Agent Details</a></li>
                            <li><a href="{{ route('agent.create') }}">Add Agent</a></li>
                        </ul>
                    </li>
                    <li class=@yield('vehicleClass')>
                        <a href="#vehicleManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Vehicle Management
                        </a>
                        <ul class="collapse list-unstyled" id="vehicleManagementSubmenu">
                            <li><a href="{{ route('vehicleType.index') }}">Vehicle Details</a></li>
                            <li><a href="{{ route('vehicleType.create') }}">Add Vehicle Type</a></li>
                            <li><a href="{{ route('vehicle.create') }}">Add Vehicle</a></li>
                        </ul>
                    </li>
                    <li class=@yield('employeeClass')>
                        <a href="#employeeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Employee
                        </a>
                        <ul class="collapse list-unstyled" id="employeeSubmenu">
                            <li><a href="{{ route('employeeTypes.index') }}">Employee Details</a></li>
                            <li><a href="{{ route('employeeTypes.create') }}">Add Employee Type</a></li>
                            <li><a href="{{ route('employeeCreate') }}">Add Employee</a></li>
                        </ul>
                    </li>
                    <li class=@yield('offerClass')>
                        <a href="#offerSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Offers
                        </a>
                        <ul class="collapse list-unstyled" id="offerSubmenu">
                            <li><a href="{{ route('offer.index') }}">Offers Details</a></li>
                            <li><a href="{{ route('offer.create') }}">Add Offers</a></li>
                        </ul>
                    </li>
                    <li class=@yield('tripClass')>
                        <a href="#tripManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Trip Management
                        </a>
                        <ul class="collapse list-unstyled" id="tripManagementSubmenu">
                            <li><a href="{{ route('destination.index') }}"> Destination Details</a></li>
                            <li><a href="{{ route('destination.create') }}">Destination Add</a></li>
                            <li><a href="{{ route('route.create') }}">Add Route </a></li>
                            <li><a href="{{ route('trip.create') }}">Create Trip</a></li>
                        </ul>
                    </li>

                    <li class=@yield('priceClass')>
                        <a href="#priceSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Price
                        </a>
                        <ul class="collapse list-unstyled" id="priceSubmenu">
                            <li><a href="{{ route('price.index') }}">Price Details</a></li>
                            <li><a href="{{ route('price.create') }}">Add Price</a></li>
                        </ul>
                    </li>

                    <li class=@yield('bookingClass')>
                        <a href="#bookingSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Booking
                        </a>
                        <ul class="collapse list-unstyled" id="bookingSubmenu">
                            <li><a href="{{ route('booking.index') }}">Booking Details</a></li>
                            <li><a href="{{ route('booking.create') }}">Add Booking</a></li>
                        </ul>
                    </li>

                    <li class=@yield('refundClass')>
                        <a href="#refundSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Refund
                        </a>
                        <ul class="collapse list-unstyled" id="refundSubmenu">
                            <li><a href="{{ route('refund.index') }}">Add Refund</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-link"></i>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-send"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        </div>

                        <div class="navbar-header">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                                <button class="btn btn-primary">
                                    Notifications<sup><span class="caret">{{ count(auth()->user()->unreadNotifications) }}</span></sup>
                                </button>
                            </a>
                        
                            <ul class="dropdown-menu">
                                @if (count(auth()->user()->unreadNotifications)>0)
                                    @foreach (auth()->user()->unreadNotifications as $notification )
                                        <div href="">
                                            <h5>{{ $notification->data['by'] }}</h5>
                                            booked for route
                                            <h6>{{ $notification->data['route'] }}</h6> 
                                            for the date
                                            <small>{{ $notification->data['date'] }}</small>
                                        </div>
                                        <hr>
                                    @endforeach
                                @else
                                    <h4>All notifications caught up</h4>
                                @endif
                            </ul>
                        </div>

                        <div class="navbar-header">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf 
                                <button class="btn btn-primary">Logout</button>
                            </form> 
                        </div>
                       
                    </div>
                </nav>
                @include('includes.alert')
                @yield('body')
            </div>
        </div>        
    </div>

    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>
</html>
