@extends('admin.adminDashboard')
@section('tripClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Add Destination') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="text" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="preview" class="col-md-4 col-form-label text-md-right">{{ __('Preview') }}</label>

                    <div class="col-md-6">
                        <input type="file" name='preview' id='preview'>
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
                            {{ __('Add Destination') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection