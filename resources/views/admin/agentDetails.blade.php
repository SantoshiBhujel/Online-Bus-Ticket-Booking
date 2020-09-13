@extends('admin.adminDashboard')
@section('agentClass')
    "active"
@endsection


@section('body')
<div class="container">
    {{-- @include('includes.alert') --}}
            
    <div class="col-md-12">
        <h2>Agents</h2>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($agents as $agent)
                        <tr>
                            <td>{{ $agent->id }}</td>
                            <td>
                                {{ $agent->name }}
                            </td>
                            <td>
                                <form action="{{ route('agent.destroy',$agent->id) }}" method="POST">
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