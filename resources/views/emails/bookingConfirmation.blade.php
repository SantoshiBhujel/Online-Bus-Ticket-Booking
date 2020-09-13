b@component('mail::message')
Congratulation

The booking has been confirmed.

Booking details

Date: {{ $booking->date }}<br>
Vehicle Type :{{ $booking->vehicleType }}<br>
Route: {{ $booking->route }}<br>
Adult Passengers: {{ $booking->adultPassengers }}<br>
Child Passengers: {{ $booking->childPassengers }}<br>
Special Passengers: {{ $booking->specialPassengers }}<br>
Offer Code: {{ $booking->offerCode }}<br>
Price: {{ $booking->price }}<br>
Pickup Location: {{ $booking->pickupLocation }}<br>
Drop Location: {{ $booking->dropLocation }}</br>
Payment Status: {{ $booking->paymentStatus }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
