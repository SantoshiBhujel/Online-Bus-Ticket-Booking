<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;

class OfferController extends Controller
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
        $offers= Offer::all();
        return \view('admin.offer.offerdetails',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes= Route::all();
        return \view('admin.offer.offerCreate',\compact('routes'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $offer= new Offer();
        $routeName= Route::findOrFail($request->routes_id);
        $offer->name = $request->name;
        $offer->routes_id = $request->routes_id;
        $offer->startDate = $request->startDate;
        $offer->endDate = $request->endDate;
        $offer->offerCode = $request->offerCode;
        $offer->discount = $request->discount;
        $offer->terms = $request->terms;
        $offer->route = $routeName->name;
        $offer->offerNumber = $request->offerNumber;
        $offer->save();

        return \redirect()->route('offer.index')->with('success','Offer added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $offer= Offer::find($offer->id);
        $routes= Route::all();
        return \view('admin.offer.offerEdit',\compact('routes','offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        $offer= Offer::find($offer->id);

        $routeName= Route::findOrFail($request->routes_id);

        $offer->update([
            'name' => $request->name,
            'routes_id' => $request->routes_id,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'offerCode' => $request->offerCode,
            'discount' => $request->discount,
            'terms' => $request->terms,
            'route' => $routeName->name,
            'offerNumber' => $request->offerNumber,
        ]);

        return \redirect()->route('offer.index')->with('success','Offer Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer= Offer::find($offer->id);
        $offer->delete();
        return \redirect()->route('offer.index')->with('success','Offer deleted.');

    }
}
