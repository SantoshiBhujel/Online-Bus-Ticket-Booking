@extends('admin.adminDashboard')
@section('vehicleClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Vehicle Types</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Layout</th>
                        <th>Total Seats</th>
                        <th style="width:300px;">Facilities</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($vehicleTypes as $vehicleType)
                        <tr>
                            <td>{{ $vehicleType->id }}</td>
                            <td>
                                {{ $vehicleType->name }}
                            </td>
                            <td>
                                {{ $vehicleType->layout }}
                            </td>
                            <td>
                                {{ $vehicleType->totalSeats }}
                            </td>
                            <td>
                                    @foreach ($vehicleType->facilities as $facility)
                                        {{ $facility->id }}. {{ $facility->services }}<br>
                                        <button>
                                            <a href="{{ route('vehicleFacilities.edit',$facility) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </button>
        
                                        <form action="{{ route('vehicleFacilities.destroy',$facility->id) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    @endforeach
                                    
                               
                                <a href="{{ route('vehicleFacilitiesCreate',$vehicleType->id) }}"><i class="fas fa-plus-circle"></i></a>
                            </td>
                            <td>
                                {{ $vehicleType->status }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('vehicleType.edit',$vehicleType->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('vehicleType.destroy',$vehicleType->id) }}" method="POST">
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
        <h2>Vehicle Types</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reg No</th>
                        <th>Vehicle Type</th>
                        <th>Engine No</th>
                        <th>Chassis No</th>
                        <th>Model No</th>
                        <th>Owner Name</th>
                        <th>Owner Number</th>
                        <th>Brand Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>
                                {{ $vehicle->regNo }}
                            </td>
                            <td>
                                {{ $vehicle->vehicleType }}
                            </td>
                            <td>
                                {{ $vehicle->engineNo }}
                            </td>
                            <td>
                                {{ $vehicle->chassisNo }}
                            </td>
                            <td>
                                {{ $vehicle->modelNo }}
                            </td>
                            <td>
                                {{ $vehicle->ownerName }}
                            </td>
                            <td>
                                {{ $vehicle->ownerNumber }}
                            </td>
                            <td>
                                {{ $vehicle->brandName }}
                            </td>
                            <td>
                                {{ $vehicle->status }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('vehicle.edit',$vehicle->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('vehicle.destroy',$vehicle->id) }}" method="POST">
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