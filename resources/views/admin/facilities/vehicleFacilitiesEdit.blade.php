@extends('admin.adminDashboard')
@section('vehicleClass')
    "active"
@endsection


@section('body')
<div class="container">
   
    <div class="card-header">{{ __('Edit Facilities') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('vehicleFacilities.update',$facility->id) }}">
            {{method_field('PATCH')}}
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" name="name" value="{{ $facility->name }}" required autofocus>
                </div>
            </div>


            <div class="form-group row">
                <label for="services" class="col-md-4 col-form-label text-md-right">{{ __('Services') }}</label>

                <div class="col-md-6">
                    <input id="services" type="text" name="services" value="{{ $facility->services }}" required autofocus>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Edit Facilities') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection