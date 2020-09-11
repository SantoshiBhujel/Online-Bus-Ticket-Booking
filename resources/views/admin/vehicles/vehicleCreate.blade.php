@extends('admin.adminDashboard')
@section('vehicleClass')
    "active"
@endsection


@section('body')
<div class="container">
   
    <div class="card-header">{{ __('Add Vehicle') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('vehicle.store') }}">
            @csrf

            <div class="form-group row">
                <label for="regNo" class="col-md-4 col-form-label text-md-right">{{ __('Registration No') }}</label>

                <div class="col-md-6">
                    <input id="regNo" type="text" name="regNo" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="vehicleType" class="col-md-4 col-form-label text-md-right">{{ __('Vehicle Type') }}</label>
                <div class="col-md-6">
                    <select name="vehicleType" required>
                        @foreach($vehicleTypes as $vehicleType)
                            <option value="{{$vehicleType->name}}">
                            {{$vehicleType->name}}
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="engineNo" class="col-md-4 col-form-label text-md-right">{{ __('Engine No') }}</label>

                <div class="col-md-6">
                    <input id="engineNo" type="text" name="engineNo" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="chassisNo" class="col-md-4 col-form-label text-md-right">{{ __('Chassis No') }}</label>

                <div class="col-md-6">
                    <input id="chassisNo" type="text" name="chassisNo" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="modelNo" class="col-md-4 col-form-label text-md-right">{{ __('Model No') }}</label>

                <div class="col-md-6">
                    <input id="modelNo" type="text" name="modelNo" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="ownerName" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }}</label>

                <div class="col-md-6">
                    <input id="ownerName" type="text" name="ownerName" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="ownerNumber" class="col-md-4 col-form-label text-md-right">{{ __('Owner Number') }}</label>

                <div class="col-md-6">
                    <input id="ownerNumber" type="text" name="ownerNumber" value="{{ old('name') }}" required autofocus>
                </div>
            </div>


            <div class="form-group row">
                <label for="brandName" class="col-md-4 col-form-label text-md-right">{{ __('Brand Name') }}</label>

                <div class="col-md-6">
                    <input id="brandName" type="text" name="brandName" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="totalSeats" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                <div class="col-md-6">
                    <input type="radio" id="status" name="status" value="Active" checked>
                    <label for="status" >Active</label><br>
                    <input type="radio" id="status" name="status" value="Inactive">
                    <label for="status" >Inactive</label><br>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Vehicle') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection