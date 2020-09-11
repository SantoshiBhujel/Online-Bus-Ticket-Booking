<?php

namespace App\Http\Controllers;

use App\Facilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
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
     * @param  \App\Facilities  $facilities
     * 
     */
    public function vehicleFacilitiesCreate($vehicleType)
    {
        // $facilityTypeID= $facilities;
        return view('admin.facilities.vehicleFacilitiesCreate',compact('vehicleType'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'services' => 'required | string',
            'vehicleTypes_id' => 'required | integer' ,
        ]);

        $facilities= new Facilities();

        $facilities->vehicleTypes_id= $request->vehicleTypes_id;
        $facilities->name= $request->name;
        $facilities->services= $request->services;
        $facilities->save();

        return \redirect()->route('vehicleType.index')->with('success','Facility Successfully added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function show(Facilities $facilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function edit($facilities)
    {
        $facility= Facilities::find($facilities);
        return view('admin.facilities.vehicleFacilitiesEdit',compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $facilities)
    {
        $facilities= Facilities::find($facilities);

        $facilities->update([
            'name' => $request->name,
            'services' => $request->services
        ]);

        return \redirect()->route('vehicleType.index')->with('success','Facility Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function destroy($facilities)
    {
        $facilities= Facilities::find($facilities);
        $facilities->delete();

        return \redirect()->route('vehicleType.index')->with('success','Facility Deleted.');
    }
}
