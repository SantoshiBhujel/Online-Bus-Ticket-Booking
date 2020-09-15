@extends('admin.adminDashboard')

@section('adminDashboardclass')
    "active"
@endsection

@section('body')
    <div class="navbar-header">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <button class="btn btn-primary">
                Notifications<sup><span class="caret">{{ count($notifications) }}</span></sup>
            </button>
        </a>
    
        <ul class="dropdown-menu">
            @if (count($notifications)>0)
                @foreach ($notifications as $notification )
                    <div href="">
                        <h5>{{ $notification->data['by'] }}</h5>
                        booked for route
                        <h6>{{ $notification->data['route'] }}</h6> 
                        on date
                        <small>{{ $notification->data['date'] }}</small>
                    </div>
                    <hr>
                @endforeach
            @else
                <h4>All notifications caught up</h4>
            @endif
        </ul>
    </div>
@endsection