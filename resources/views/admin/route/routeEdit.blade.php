@extends('admin.adminDashboard')
@section('tripClass')
    "active"
@endsection


@section('body')
<div class="container">
    <div class="">
        <div class="card-header">{{ __('Add Route') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('route.update',$route->id) }}" >
                {{ method_field('PATCH') }}
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" name="name" value="{{ $route->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startPoint" class="col-md-4 col-form-label text-md-right">{{ __('Start Point') }}</label>
                    <div class="col-md-6">
                        <select name="startPoint" required>
                            @foreach($destinations as $destination)
                                <option value="{{$destination->name}}">
                                {{$destination->name}}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endPoint" class="col-md-4 col-form-label text-md-right">{{ __('End Point') }}</label>
                    <div class="col-md-6">
                        <select name="endPoint" required>
                            @foreach($destinations as $destination)
                                <option value="{{$destination->name}}">
                                {{$destination->name}}
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">

                    <label for="" class="col-md-4 col-form-label text-md-right">Stoppage Points</label><br>
                    @foreach($destinations as $destination)
                        <input type="checkbox" name="stoppagePoints[]" value="{{ $destination->name }}">
                        {{ $destination->name }}
                    @endforeach
                </div>

                <div class="form-group row">
                    <label for="distanceTravelTime" class="col-md-4 col-form-label text-md-right">{{ __('Distance Travel Time') }}</label>

                    <div class="col-md-6">
                        <input id="distanceTravelTime" type="text" name="distanceTravelTime" value="{{ $route->distanceTravelTime }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="childrenSeat" class="col-md-4 col-form-label text-md-right">{{ __('Children Seat') }}</label>

                    <div class="col-md-6">
                        <input id="childrenSeat" type="text" name="childrenSeat" value="{{ $route->childrenSeat }}" required  autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="specialSeat" class="col-md-4 col-form-label text-md-right">{{ __('Special Seat') }}</label>

                    <div class="col-md-6">
                        <input id="specialSeat" type="text" name="specialSeat" value="{{ $route->specialSeat }}" required  autofocus>
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
                            {{ __('Add Route') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection