@extends('users.home')
@section('bookingClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Update Booking') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('userBooking.update',$userBooking->id) }}">
                {{ method_field('PATCH') }}
                @csrf

                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                    <div class="col-md-6">
                        <input id="" type="date" name="date" value="{{ $userBooking->date }}"required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vehicleType" class="col-md-4 col-form-label text-md-right">{{ __('Vehicle Type') }}</label>
                    <div class="col-md-6">
                        <select id="vehicleType" name="vehicleType" required>
                            @foreach($vehicleTypes as $vehicleType)
                                <option value="{{$vehicleType->name}}">
                                {{$vehicleType->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vehicle" class="col-md-4 col-form-label text-md-right">{{ __('Vehicles Available') }}</label>
                    <div class="col-md-6">
                        <select id="vehicle" name="vehicleNo">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="route" class="col-md-4 col-form-label text-md-right">{{ __('Route Name') }}</label>

                    <div class="col-md-6">
                        <select name="route" required>
                            @foreach($routes as $route)
                                <option value="{{$route->name}}">
                                {{$route->name}}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adultPassengers" class="col-md-4 col-form-label text-md-right">{{ __('Adult Passengers Number') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="adultPassengers" value=" {{  $userBooking->adultPassengers }}" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="childPassengers" class="col-md-4 col-form-label text-md-right">{{ __('Child Passengers Number') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="childPassengers" value=" {{  $userBooking->childPassengers }}"required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="specialPassengers" class="col-md-4 col-form-label text-md-right">{{ __('Special Passenger Number') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="specialPassengers" value=" {{ $userBooking->specialPassengers }}"required  autofocus>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="offerCode" class="col-md-4 col-form-label text-md-right">{{ __('Offer Code') }}</label>

                    <div class="col-md-6">
                        <select name="offerCode">
                            @foreach($offers as $offer)
                                <option value="{{$offer->offerCode}}">
                                {{$offer->offerCode}}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="price" value="{{ $userBooking->price }}" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Pname" class="col-md-4 col-form-label text-md-right">{{ __("Passenger's Name") }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="Pname" value="{{  $userBooking->Pname }}" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Pemail" class="col-md-4 col-form-label text-md-right">{{ __('Passenger Email') }}</label>

                    <div class="col-md-6">
                        <input id="" type="email" name="Pemail" value="{{  $userBooking->Pemail }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pickupLocation" class="col-md-4 col-form-label text-md-right">{{ __('Pickup Location') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="pickupLocation" value="{{  $userBooking->pickupLocation }}" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label for="dropLocation" class="col-md-4 col-form-label text-md-right">{{ __('Drop Location') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="dropLocation" value="{{  $userBooking->dropLocation }}" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Booking') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection