<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Route;
use App\Booking;
use App\UserBooking;
use App\VehicleType;
use App\Events\BookingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email= Auth::user()->email;
        $bookings= UserBooking::where('Pemail',$email)->get();
        return view('users.userBookingDetails',compact('bookings'));
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
        
        return view('users.userBookingCreate',compact('vehicleTypes','routes','offers'));
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
            'vehicleNo'         => 'required | string',
            'route'             => 'required | string',
            'adultPassengers'   => 'required | integer',
            'childPassengers'   => 'nullable | integer',
            'specialPassengers' => 'nullable | integer',
            'offerCode'         => 'nullable | string',
            'price'             => 'required | integer',
            'Pname'             => 'required | string',
            'Pemail'            => 'required | email',
            'pickupLocation'    => 'required | string',
            'dropLocation'      => 'required | string',
        ]);
        
        $userBooking= UserBooking::create([
            'date' => $request->date,
            'vehicleType' => $request->vehicleType,
            'vehicleNo' => $request->vehicleNo,
            'route' => $request->route,
            'adultPassengers' => $request->adultPassengers,
            'childPassengers' => $request->childPassengers,
            'specialPassengers' => $request->specialPassengers,
            'offerCode' => $request->offerCode,
            'price' => $request->price,
            'Pname' =>$request->Pname,
            'Pemail' => $request->Pemail,
            'pickupLocation'=> $request->pickupLocation,
            'dropLocation'=> $request->dropLocation
        ]);

        $booking= Booking::findOrFail($userBooking->id);


        event(new BookingEvent($booking));

        return \redirect()->route('userBooking.index')->with('success','Successfully Booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function show(UserBooking $userBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBooking $userBooking)
    {
        $vehicleTypes=VehicleType::all();
        $routes= Route::all();
        $offers= Offer::all();
        $userBooking= UserBooking::findOrFail($userBooking->id);
        return view('users.userBookingEdit',compact('userBooking','vehicleTypes','routes','offers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBooking $userBooking)
    {
        $this->validate($request,[
            'date'              => 'sometimes | date | after:today',
            'vehicleType'       => 'sometimes | string',
            'vehicleNo'         => 'sometimes | string',
            'route'             => 'sometimes | string',
            'adultPassengers'   => 'required | integer',
            'childPassengers'   => 'nullable | integer',
            'specialPassengers' => 'nullable | integer',
            'offerCode'         => 'nullable | string',
            'price'             => 'required | integer',
            'Pname'             => 'required | string',
            'Pemail'            => 'required | email',
            'pickupLocation'    => 'required | string',
            'dropLocation'      => 'required | string',
        ]);
        
        $userBooking= UserBooking::find($userBooking->id);
        $userBooking->update([
            'date' => $request->date,
            'vehicleType' => $request->has('vehicleType') ? $request->vehicleType : $userBooking->vehicleType,
            'vehicleNo' =>$request->has('vehicleNo') ? $request->vehicleNo : $userBooking->vehicleNo,
            'route' => $request->has('route') ? $request->route :$userBooking->route,
            'adultPassengers' => $request->adultPassengers,
            'childPassengers' => $request->childPassengers,
            'specialPassengers' => $request->specialPassengers,
            'offerCode' => $request->offerCode,
            'price' => $request->price,
            'Pname' =>$request->Pname,
            'Pemail' => $request->Pemail,
            'pickupLocation'=> $request->pickupLocation,
            'dropLocation'=> $request->dropLocation
        ]);

        return \redirect()->route('userBooking.index')->with('success','Booking Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserBooking  $userBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBooking $userBooking)
    {
        $booking= UserBooking::findOrFail($userBooking->id);
        $booking->delete();
        return \redirect()->route('userBooking.index')->with('success','Booking Deleted');
    }
}
