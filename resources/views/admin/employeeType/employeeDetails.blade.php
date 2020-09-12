@extends('admin.adminDashboard')
@section('employeeClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Employee Types</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($employeeTypes as $employeeType)
                        <tr>
                            <td>{{ $employeeType->id }}</td>
                            <td>
                                {{ $employeeType->position }}
                            </td>
                            <td>
                                {{ $employeeType->details }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('employeeTypes.edit',$employeeType->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('employeeTypes.destroy',$employeeType->id) }}" method="POST">
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
    {{-- <div class="col-md-12">
        <h2>Employee</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>
                                {{ $employee->name }}
                            </td>
                            <td>
                                {{ $employee->position }}
                            </td>
                            <td>
                                {{ $employee->phone }}
                            </td>
                            <td>
                                {{ $employee->address }}
                            </td>
                            <td>
                                {{ $vehicleType->status }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('employee.edit',$employee->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
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
    </div> --}}
</div>
@endsection