@extends('admin.adminDashboard')
@section('vehicleClass')
    "active"
@endsection


@section('body')
<div class="container">
   
    <div class="card-header">{{ __('Edit Vehicle Type') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('vehicleType.update',$vehicleType->id) }}">
            {{method_field('PATCH')}}
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" name="name" value="{{ $vehicleType->name }}" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="layout" class="col-md-4 col-form-label text-md-right">Layout</label>
                <div class="col-md-6">
                    <select name="layout" required>
                        <option value="2-2">2-2</option>
                        <option value="1-1">1-1</option>
                        <option value="2-1">2-1</option>
                        <option value="1-2">1-2</option>
                        <option value="3-2">3-2</option>
                        <option value="2-3">2-3</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="totalSeats" class="col-md-4 col-form-label text-md-right">{{ __('Total Seats') }}</label>

                <div class="col-md-6">
                    <input id="totalSeats" type="text" name="totalSeats" value="{{ $vehicleType->totalSeats }}" required autocomplete="totalSeats" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="totalSeats" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                <div class="col-md-6">
                    <input type="radio" id="status" name="status" value="active">
                    <label for="status" >Active</label><br>
                    <input type="radio" id="status" name="status" value="inactive">
                    <label for="status" >Inactive</label><br>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Edit Vehicle Type') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection