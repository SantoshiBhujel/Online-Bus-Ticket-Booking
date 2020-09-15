@extends('admin.adminDashboard')
@section('bookingClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="col-md-12">
        <h2>Booking Details</h2>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Number</th>
                        <th>Route Name</th>
                        <th>Adult Passengers</th>
                        <th>Child Passengers </th>
                        <th>Special Passenger</th>
                        <th>Offer Code</th>
                        <th>Price</th>
                        <th>Passenger's Name</th>
                        <th>Passenger Email</th>
                        <th>Pickup Location</th>
                        <th>Drop Location</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>
                                {{ $booking->date }}
                            </td>
                            <td>
                                {{ $booking->vehicleType }}
                            </td>
                            <td>
                                {{ $booking->vehicleNo }}
                            </td>
                            <td>
                                {{ $booking->route}}
                            </td>
                            <td>
                                {{ $booking->adultPassengers}}
                            </td>
                            <td>
                                {{ $booking->childPassengers}}
                            </td>
                            <td>
                                {{ $booking->specialPassengers}}
                            </td>
                            <td>
                                {{ $booking->offerCode}}
                            </td>
                            <td>
                                {{ $booking->price}}
                            </td>
                            <td>
                                {{ $booking->Pname }}
                            </td>
                            <td>
                                {{ $booking->Pemail}}
                            </td>
                            <td>
                                {{ $booking->pickupLocation}}
                            </td>
                            <td>
                                {{ $booking->dropLocation}}
                            </td>
                            <td>
                                {{ $booking->paymentStatus}}
                            </td>

                            <td>
                                @if ($booking->paymentStatus=='paid')
                                    <button>
                                        <a href="{{ route('refund.edit',$booking->id) }}"><i class="fas fa-undo"></i>
                                        </a>
                                    </button>
                                @endif
                                <button>
                                    <a href="{{ route('booking.edit',$booking->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
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