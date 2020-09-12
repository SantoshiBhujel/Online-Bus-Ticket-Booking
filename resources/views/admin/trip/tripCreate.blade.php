@extends('admin.adminDashboard')
@section('tripClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Add Trip') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('trip.store') }}" >
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" name="title" value="{{ old('title') }}" required autofocus>
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
                    <label for="route" class="col-md-4 col-form-label text-md-right">{{ __('Route') }}</label>
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
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
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
                            {{ __('Add Trip') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection