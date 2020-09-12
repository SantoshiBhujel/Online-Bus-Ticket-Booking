@extends('admin.adminDashboard')
@section('tripClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Destinations</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Destination Name</th>
                        <th>Description</th>
                        <th>Preview</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($destinations as $destination)
                        <tr>
                            <td>{{ $destination->id }}</td>
                            <td>
                                {{ $destination->name }}
                            </td>
                            <td>
                                {{ $destination->description }}
                            </td>
                            <td>
                                <img src="/storage/destination_images/{{$destination->preview}}" alt="" width="200px">
                                <div>
                                    <a href="{{ route('destination.previewEdit',$destination->id) }}">
                                        Edit <i class="fas fa-image"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                {{ $destination->status }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('destination.edit',$destination->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('destination.destroy',$destination->id) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>


    <div class="col-md-12">
        <h2>Routes</h2>
        <div>
            <table style="width:1000px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start Point</th>
                        <th>End Point</th>
                        <th>Stoppage Points</th>
                        <th>Distane Travel Time</th>
                        <th>Children Seat</th>
                        <th>Special Seat</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($routes as $route)
                        <tr>
                            <td>{{ $route->id }}</td>
                            <td>
                                {{ $route->name }}
                            </td>
                            <td>
                                {{ $route->startPoint }}
                            </td>
                            <td>
                                {{ $route->endPoint }}
                            </td>

                            <td>
                                @foreach (json_decode($route->stoppagePoints) as $item)
                                    -{{ $item }}<br>
                                @endforeach
                                {{-- {{  json_decode($route->stoppagePoints) }} --}}
                            </td>
                    
                            <td>
                                {{ $route->distanceTravelTime }} Hrs
                            </td>

                            <td>
                                {{ $route->childrenSeat }}
                            </td>

                            <td>
                                {{ $route->specialSeat }}
                            </td>
                            <td>
                                {{ $route->status }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('route.edit',$route->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('route.destroy',$route->id) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>

    <div class="col-md-12">
        <h2>Trips</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Trips</th>
                        <th>Vehicle Type</th>
                        <th>Route</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($trips as $trip)
                        <tr>
                            <td>{{ $trip->id }}</td>
                            <td>
                                {{ $trip->title }}
                            </td>
                            <td>
                                {{ $trip->vehicleType }}
                            </td>
                            <td>
                                {{ $trip->route }}
                            </td>
                            <td>
                                {{ $trip->status }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('trip.edit',$trip->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('trip.destroy',$trip->id) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>
</div>
@endsection