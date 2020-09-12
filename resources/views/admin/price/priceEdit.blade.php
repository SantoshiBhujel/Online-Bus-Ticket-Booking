@extends('admin.adminDashboard')
@section('priceClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Edit Price') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('price.update',$price->id) }}">
                {{ method_field('PATCH') }}
                @csrf

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
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="text" name="price" value="{{ $price->price }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="childrenPrice" class="col-md-4 col-form-label text-md-right">{{ __('Children Price') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="childrenPrice" value="{{ $price->childrenPrice }}" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label for="specialPrice" class="col-md-4 col-form-label text-md-right">{{ __('Special Price') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="specialPrice" value="{{ $price->specialPrice }}" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Edit Price') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection