@extends('users.home')
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
                        <th>Vehicle No</th>
                        <th>Route Name</th>
                        <th>Adult Passengers</th>
                        <th>Child Passengers </th>
                        <th>Special Passenger</th>
                        <th>Offer Code</th>
                        <th>Price</th>
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
                                <button>
                                    <a href="{{ route('userBooking.edit',$booking->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </button>

                                <form action="{{ route('userBooking.destroy',$booking->id) }}" method="POST">
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