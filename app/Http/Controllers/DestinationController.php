<?php

namespace App\Http\Controllers;

use App\Route;
use App\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
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
        $destinations= Destination::all();
        $routes= Route::all();
        return view('admin.destination.details',compact('destinations','routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.destination.destinationCreate');
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
            'name'=> 'required | string',
            'description' => 'required | string ',
            'preview'=> 'image | required | max:2047',
            'status' => 'required | string '
        ]);


        $destination= new Destination;
        
        $destination->name= $request->name;
        $destination->description = $request->description;

        $extension=$request->file('preview')->getClientOriginalExtension();
        $fileName= 'destination'.'-'.time().'.'.$extension;
        $path=$request->file('preview')->storeAs('public/destination_images',$fileName);
        $destination->preview = $fileName;

        $destination->status= $request->status;
        $destination->save();
        
        return redirect()->route('destination.index')->with('success','Destination Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        $destination= Destination::find($destination->id);
        return \view('admin.destination.destinationEdit',compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $this->validate($request,[
            'name'=> 'required | string',
            'description' => 'required | string ',
            'status' => 'required | string '
        ]);


        $destination= Destination::find($destination->id);
        
        $destination->name= $request->name;
        $destination->description = $request->description;
        $destination->status= $request->status;
        $destination->save();
        
        return redirect()->route('destination.index')->with('success','Destination Edited');
    }

    public function previewEdit($destination)
    {
        $destination= Destination::find($destination);
        return \view('admin.destination.destinationPreviewEdit',compact('destination'));
    }

    public function previewUpdate(Request $request,$destination)
    {
        $this->validate($request,[
            'preview'=> 'image | required | max:2047',
        ]);

        $destination= Destination::find($destination);

        $extension=$request->file('preview')->getClientOriginalExtension();
        $fileName= 'destination'.'-'.time().'.'.$extension;
        $path=$request->file('preview')->storeAs('public/destination_images',$fileName);
        $destination->preview = $fileName;
        $destination->save();
        return redirect()->route('destination.index')->with('success','Destination Preview Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination= Destination::find($destination->id);
        $destination->delete();
        return \redirect()->route('destination.index')->with('success',"Destination Deleted");
    }
    
}
