<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
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
        $vehicleTypes= VehicleType::all();
        $vehicles = Vehicle::all();
        return view('admin.vehicleDetails',compact('vehicleTypes','vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicleType.vehicleTypeCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required | string',
            'layout' => 'required',
            'totalSeats' => 'required | integer' ,
            'status' => 'required '
        ]);

        $vehicleType= new VehicleType();
        $vehicleType->name = $request->name;
        $vehicleType->layout = $request->layout;
        $vehicleType->totalSeats = $request->totalSeats;
        $vehicleType->status = $request->status;
        $vehicleType->save();

        return \redirect()->route('vehicleType.index')->with('success','Vehicle Type Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleType $vehicleType)
    {
        $vehicleType= VehicleType::find($vehicleType->id);
        return view('admin.vehicleType.vehicleTypeEdit',compact('vehicleType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        $this->validate($request,[
            'name'=> 'required | string',
            'layout' => 'required',
            'totalSeats' => 'required | integer' ,
            'status' => 'required '
        ]);

        $vehicleType= VehicleType::find($vehicleType->id);
        $vehicleType->name = $request->name;
        $vehicleType->layout = $request->layout;
        $vehicleType->totalSeats = $request->totalSeats;
        $vehicleType->status = $request->status;
        $vehicleType->save();

        return \redirect()->route('vehicleType.index')->with('success','Vehicle Type Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleType $vehicleType)
    {
        $vehicleType= VehicleType::find($vehicleType->id);
        $vehicleType->delete();
        return \redirect()->route('vehicleType.index')->with('success','Vehicle Type Deleted.');
    }
}
