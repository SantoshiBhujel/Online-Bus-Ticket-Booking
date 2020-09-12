@extends('admin.adminDashboard')
@section('tripClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Update Destination Preview') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('destination.previewUpdate',$destination->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row">
                    <label for="preview" class="col-md-4 col-form-label text-md-right">{{ __('Preview') }}</label>

                    <div class="col-md-6">
                        <input type="file" name='preview' id='preview'>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Destination Preview') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection