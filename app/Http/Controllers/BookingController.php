<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Route;
use App\Booking;
use App\VehicleType;
use App\Events\BookingEvent;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings= Booking::all();
        return view('admin.booking.bookingDetails',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleTypes=VehicleType::all();
        $routes= Route::all();
        $offers= Offer::all();
        
        return view('admin.booking.bookingCreate',compact('vehicleTypes','routes','offers'));
        
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
            'date'              => 'required | date | after:today',
            'vehicleType'       => 'required | string',
            'route'             => 'required | string',
            'adultPassengers'   => 'required | integer',
            'childPassengers'   => 'nullable | integer',
            'specialPassengers' => 'nullable | integer',
            'offerCode'         => 'nullable | string',
            'price'             => 'required | integer',
            'Pemail'            => 'required | email',
            'pickupLocation'    => 'required | string',
            'dropLocation'      => 'required | string',
        ]);

        if($request->has('offerCode'))
        {
            $offerCode= $request->offerCode;
        }
        else
        {
            $offerCode= '';
        }
        
        $booking= Booking::create([
            'date' => $request->date,
            'vehicleType' => $request->vehicleType,
            'route' => $request->route,
            'adultPassengers' => $request->adultPassengers,
            'childPassengers' => $request->childPassengers,
            'specialPassengers' => $request->specialPassengers,
            'offerCode' => $offerCode,
            'price' => $request->price,
            'Pemail' => $request->Pemail,
            'pickupLocation'=> $request->pickupLocation,
            'dropLocation'=> $request->dropLocation
        ]);

        event(new BookingEvent($booking));

        return \redirect()->route('booking.index')->with('success','Successfully Booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $vehicleTypes=VehicleType::all();
        $routes= Route::all();
        $offers= Offer::all();
        $booking= Booking::findOrFail($booking->id);
        return view('admin.booking.bookingEdit',compact('booking','vehicleTypes','routes','offers'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $this->validate($request,[
            'date'              => 'required | date | after:today',
            'vehicleType'       => 'required | string',
            'route'             => 'required | string',
            'adultPassengers'   => 'required | integer',
            'childPassengers'   => 'nullable | integer',
            'specialPassengers' => 'nullable | integer',
            'offerCode'         => 'nullable | string',
            'price'             => 'required | integer',
            'Pemail'            => 'required | email',
            'pickupLocation'    => 'required | string',
            'dropLocation'      => 'required | string',
        ]);

        $booking= Booking::findOrFail($booking->id);
        
        $booking->date = $request->date;
        $booking->vehicleType = $request->vehicleType;
        $booking->route = $request->route;
        $booking->adultPassengers = $request->adultPassengers;
        $booking->childPassengers = $request->childPassengers;
        $booking->specialPassengers = $request->specialPassengers;
        $booking->offerCode = $request->offerCode;
        $booking->price = $request->price;
        $booking->Pemail = $request->Pemail;
        $booking->pickupLocation= $request->pickupLocation;
        $booking->dropLocation= $request->dropLocation;
        $booking->save();

        return \redirect()->route('booking.index')->with('success','Booking Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking= Booking::findOrFail($booking->id);
        $booking->delete();
        return \redirect()->route('booking.index')->with('success','Booking Deleted');
    }
}
