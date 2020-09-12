@extends('admin.adminDashboard')
@section('priceClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Price Details</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Route Name</th>
                        <th>Vehicle Type</th>
                        <th>Price</th>
                        <th>Children Price</th>
                        <th>Special Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{ $price->id }}</td>
                            <td>
                                {{ $price->route }}
                            </td>
                            <td>
                                {{ $price->vehicleType }}
                            </td>
                            <td>
                                {{ $price->price }}
                            </td>
                            <td>
                                {{ $price->childrenPrice }}
                            </td>
                            <td>
                                {{ $price->specialPrice }}
                            </td>
                            <td>
                                <button>
                                    <a href="{{ route('price.edit',$price->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('price.destroy',$price->id) }}" method="POST">
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