@extends('admin.adminDashboard')
@section('refundClass')
    "active"
@endsection


@section('body')
<div class="container">
   
    <div class="card-header">{{ __('Refund') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('refund.store') }}">
            @csrf

            <div class="form-group row">
                <label for="bookingId" class="col-md-4 col-form-label text-md-right">{{ __('Booking ID') }}</label>

                <div class="col-md-6">
                    <input id="bookingId" type="text" name="bookingId" value="" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="PasName" class="col-md-4 col-form-label text-md-right">{{ __("Passenger's Name") }}</label>

                <div class="col-md-6">
                    <input id="PasName" type="text" name="PasName" value="" required autofocus>
                </div>
            </div>


            <div class="form-group row">
                <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('Cancellation Fee') }}</label>

                <div class="col-md-6">
                    <input id="" type="text" name="totalSeats" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="causes" class="col-md-4 col-form-label text-md-right">{{ __('Causes') }}</label>

                <div class="col-md-6">
                    <input id="" type="text" name="causes" value="" required autofocus>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Refund') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection