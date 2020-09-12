<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Route;
use App\VehicleType;
use Illuminate\Http\Request;

class TripController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleTypes= VehicleType::all();
        $routes= Route::all();
        return view('admin.trip.tripCreate',compact('routes','vehicleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'title'=> 'required | string',
            'vehicleType' => 'required | string ',
            'route'=> 'required | string',
            'status' => 'required | string '
        ]);
        $trip = new Trip();

        $trip->title= $request->title;
        $trip->vehicleType= $request->vehicleType;
        $trip->route= $request->route;
        $trip->status = $request->status;
        $trip->save();

        return \redirect()->route('destination.index')->with('success','Route Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        $trip= Trip::find($trip->id);
        $vehicleTypes= VehicleType::all();
        $routes= Route::all();
        return view('admin.trip.tripEdit',compact('trip','routes','vehicleTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        $this->validate($request,[
            'title'=> 'required | string',
            'vehicleType' => 'required | string ',
            'route'=> 'required | string',
            'status' => 'required | string '
        ]);
        $trip = Trip::find($trip->id);

        $trip->title= $request->title;
        $trip->vehicleType= $request->vehicleType;
        $trip->route= $request->route;
        $trip->status = $request->status;
        $trip->save();

        return \redirect()->route('destination.index')->with('success','Trip Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip = Trip::find($trip->id);
        $trip->delete();

        return \redirect()->route('destination.index')->with('success','Trip Deleted.');
    }
}
