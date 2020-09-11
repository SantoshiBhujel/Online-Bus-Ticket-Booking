@extends('admin.adminDashboard')
@section('vehicleClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Vehicle Types</h2>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Layout</th>
                        <th>Total Seats</th>
                        <th>Facilities</th>
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
                                <a href=""><i class="fas fa-plus-circle"></i></a>
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
</div>
@endsection