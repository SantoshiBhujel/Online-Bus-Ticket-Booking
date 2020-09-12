@extends('admin.adminDashboard')
@section('offerClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Add Offer') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('offer.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="name" value="{{ old('name') }}" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startDate" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                    <div class="col-md-6">
                        <input id="" type="date" name="startDate" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endDate" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                    <div class="col-md-6">
                        <input id="" type="date" name="endDate" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="offerCode" class="col-md-4 col-form-label text-md-right">{{ __('Offer Code') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="offerCode" value="{{ old('offerCode') }}" required  autofocus>
                    </div>
                </div>



                <div class="form-group row">
                    <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" name="discount" value="{{ old('discount') }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="terms" class="col-md-4 col-form-label text-md-right">{{ __('Terms of Discount') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="terms" value="{{ old('terms') }}" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label for="routes_id" class="col-md-4 col-form-label text-md-right">{{ __('Offer Route Name') }}</label>

                    <div class="col-md-6">
                        <select name="routes_id" required>
                            @foreach($routes as $route)
                                <option value="{{$route->id}}">
                                {{$route->name}}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="offerNumber" class="col-md-4 col-form-label text-md-right">{{ __('Offer Number') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="offerNumber" value="{{ old('offerNumber') }}" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Offer') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection