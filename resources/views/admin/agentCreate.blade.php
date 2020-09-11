@extends('admin.adminDashboard')
@section('agentClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Add Agents') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('agent.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Agents') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection