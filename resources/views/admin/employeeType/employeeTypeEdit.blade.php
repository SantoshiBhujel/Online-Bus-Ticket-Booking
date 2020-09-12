@extends('admin.adminDashboard')
@section('employeeClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Edit Employee Type') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('employeeTypes.update',$employeeType->id) }}">
                {{ method_field('PATCH') }}
                @csrf

                <div class="form-group row">
                    <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                    <div class="col-md-6">
                        <input id="position" type="text" name="position" value="{{ $employeeType->position }}" required autocomplete="position" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>

                    <div class="col-md-6">
                        <input id="details" type="text" name="details" value="{{ $employeeType->details }}" required autocomplete="details" autofocus>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Edit Employee Type') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection