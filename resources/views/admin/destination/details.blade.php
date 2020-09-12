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
</div>
@endsection