@extends('admin.adminDashboard')
@section('tripClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Edit Destination') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('destination.update',$destination->id) }}">
                {{ method_field('PATCH') }}
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" name="name" value="{{ $destination->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="text" name="description" value="{{ $destination->description }}" required autofocus>
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
                            {{ __('Edit Destination') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection