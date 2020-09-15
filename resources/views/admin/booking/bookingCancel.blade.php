@extends('admin.adminDashboard')
@section('bookingClass')
    "active"
@endsection


@section('body')

<div class="container">
    <div class="">
        <div class="card-header">{{ __('Cancel Booking') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('booking.Cancel') }}">
                @csrf

                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Cancelled For Date') }}</label>

                    <div class="col-md-6">
                        <input id="" type="date" name="date" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cause" class="col-md-4 col-form-label text-md-right">{{ __('Cause') }}</label>
                    
                    <div class="col-md-6">
                        <input id="" type="text" name="cause" required  autofocus>
                    </div>
                    
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Book') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection