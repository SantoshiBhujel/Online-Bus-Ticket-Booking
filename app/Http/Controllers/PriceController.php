<?php

namespace App\Http\Controllers;

use App\Price;
use App\Route;
use App\VehicleType;
use Illuminate\Http\Request;
use App\Http\Requests\PriceRequest;

class PriceController extends Controller
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
        $prices= Price::all();
        return view('admin.price.priceDetails',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes= Route::all();
        $vehicleTypes = VehicleType::all();
        return \view('admin.price.priceCreate',\compact('routes','vehicleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceRequest $request)
    {
        $price= new Price();

        $price->route = $request->route;
        $price->vehicleType = $request->vehicleType;
        $price->price = $request->price;
        $price->childrenPrice = $request->childrenPrice;
        $price->specialPrice = $request->specialPrice;
        $price->save();

        return \redirect()->route('price.index')->with('success','Price added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        $price= Price::find($price->id);
        $routes= Route::all();
        $vehicleTypes = VehicleType::all();
        return \view('admin.price.priceEdit',\compact('routes','vehicleTypes','price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(PriceRequest $request, Price $price)
    {
        $price= Price::find($price->id);

        $price->route = $request->route;
        $price->vehicleType = $request->vehicleType;
        $price->price = $request->price;
        $price->childrenPrice = $request->childrenPrice;
        $price->specialPrice = $request->specialPrice;
        $price->save();

        return \redirect()->route('price.index')->with('success','Price edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price= Price::find($price->id);
        $price->delete();
        return \redirect()->route('price.index')->with('success','Price Deleted.');
    }
}
