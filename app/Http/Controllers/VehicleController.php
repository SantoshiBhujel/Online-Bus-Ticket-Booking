<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\VehicleType;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
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
        return view('admin.vehicles.vehicleCreate',compact('vehicleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle= new Vehicle();
        $vehicle->regNo = $request->regNo;
        $vehicle->vehicleType = $request->vehicleType;
        $vehicle->engineNo = $request->engineNo;
        $vehicle->chassisNo = $request->chassisNo;
        $vehicle->modelNo = $request->modelNo;
        $vehicle->ownerName = $request->ownerName;
        $vehicle->ownerNumber= $request->ownerNumber;
        $vehicle->brandName = $request->brandName;
        $vehicle->status = $request->status;
        $vehicle->save();

        return \redirect()->route('vehicleType.index')->with('success','Vehicle Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicleTypes= VehicleType::all();
        $vehicle= Vehicle::find($vehicle->id);
        return view('admin.vehicles.vehicleEdit',compact('vehicleTypes','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //dd($request->all());
        $vehicle= Vehicle::find($vehicle->id);
        $vehicle->regNo = $request->regNo;
        $vehicle->vehicleType = $request->vehicleType;
        $vehicle->engineNo = $request->engineNo;
        $vehicle->chassisNo = $request->chassisNo;
        $vehicle->modelNo = $request->modelNo;
        $vehicle->ownerName = $request->ownerName;
        $vehicle->ownerNumber= $request->ownerNumber;
        $vehicle->brandName = $request->brandName;
        $vehicle->status = $request->status;
        $vehicle->save();

        return \redirect()->route('vehicleType.index')->with('success','Vehicle Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle= Vehicle::find($vehicle->id);
        $vehicle->delete();
        return \redirect()->route('vehicleType.index')->with('success','Vehicle Deleted.');
    }
}
