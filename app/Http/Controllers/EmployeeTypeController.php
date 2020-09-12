<?php

namespace App\Http\Controllers;

use App\EmployeeType;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
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
        $employeeTypes= EmployeeType::all();
        return view('admin.employeeType.employeeDetails',compact('employeeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employeeType.employeeTypeCreate');
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
            'position'=> 'required | string',
            'details' => 'required | string',
        ]);

        $employeeType= new EmployeeType();

        $employeeType->position= $request->position;
        $employeeType->details= $request->details;
        $employeeType->save();

        return \redirect()->route('employeeTypes.index')->with('success','Employee Type added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeType $employeeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeType $employeeType)
    {
        $employeeType= EmployeeType::find($employeeType->id);
        return view('admin.employeeType.employeeTypeEdit',compact('employeeType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeType $employeeType)
    {

        $this->validate($request,[
            'position'=> 'required | string',
            'details' => 'required | string',
        ]);

        $employeeType= EmployeeType::find($employeeType->id);

        $employeeType->position= $request->position;
        $employeeType->details= $request->details;
        $employeeType->save();

        return \redirect()->route('employeeTypes.index')->with('success','Employee Type edited.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeType $employeeType)
    {
        $employeeType= EmployeeType::find($employeeType->id);
        $employeeType->delete();
        return \redirect()->route('employeeTypes.index')->with('success','Employee Type deleted.');

    }
}
