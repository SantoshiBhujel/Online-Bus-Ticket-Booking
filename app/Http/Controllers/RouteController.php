<?php

namespace App\Http\Controllers;

use App\Route;
use App\Destination;
use Illuminate\Http\Request;
use App\Http\Requests\RouteRequest;

class RouteController extends Controller
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
        $destinations= Destination::all();
        return view('admin.route.routeCreate',compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        //dd($request->all());

        $route = new Route();

        $route->name= $request->name;
        $route->startPoint= $request->startPoint;
        $route->endPoint= $request->endPoint;
        $route->stoppagePoints= json_encode($request->stoppagePoints);
        $route->distanceTravelTime= $request->distanceTravelTime;
        $route->childrenSeat= $request->childrenSeat;
        $route->specialSeat= $request->specialSeat;
        $route->status= $request->status;
        $route->save();

        return \redirect()->route('destination.index')->with('success','Route Successfully added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        $route= Route::find($route->id);
        $destinations= Destination::all();
        return view('admin.route.routeEdit',compact('route','destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, Route $route)
    {
        $route = Route::find($route->id);

        $route->name= $request->name;
        $route->startPoint= $request->startPoint;
        $route->endPoint= $request->endPoint;
        $route->stoppagePoints= json_encode($request->stoppagePoints);
        $route->distanceTravelTime= $request->distanceTravelTime;
        $route->childrenSeat= $request->childrenSeat;
        $route->specialSeat= $request->specialSeat;
        $route->status= $request->status;
        $route->save();

        return \redirect()->route('destination.index')->with('success','Route Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route = Route::find($route->id);
        $route->delete();
        return \redirect()->route('destination.index')->with('success','Route Deleted.');
    }
}
