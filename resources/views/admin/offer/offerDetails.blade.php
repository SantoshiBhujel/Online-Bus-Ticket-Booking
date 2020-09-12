@extends('admin.adminDashboard')
@section('offerClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Offer Details</h2>
        <div>
            <table style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Offer Code</th>
                        <th>Discount</th>
                        <th>Terms of Discount</th>
                        <th>Route</th>
                        <th>Offer Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $offer->id }}</td>
                            <td>
                                {{ $offer->name }}
                            </td>
                            <td>
                                {{ $offer->startDate }}
                            </td>
                            <td>
                                {{ $offer->endDate}}
                            </td>
                            <td>
                                {{ $offer->offerCode}}
                            </td>
                            <td>
                                {{ $offer->discount}}
                            </td>
                            <td>
                                {{ $offer->terms}}
                            </td>
                            <td>
                                {{ $offer->route}}
                            </td>
                            
                            <td>
                                {{ $offer->offerNumber}}
                            </td>

                            <td>
                                <button>
                                    <a href="{{ route('offer.edit',$offer->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('offer.destroy',$offer->id) }}" method="POST">
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