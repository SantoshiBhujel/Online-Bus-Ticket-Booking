<?php

namespace App\Http\Controllers;

use App\Booking;
use App\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->role=='admin')
        {
            return redirect()->route('admin');
        }
        else
        {
            return view('users.home');
        }
    }

    public function admin()
    {
        return view('admin.adminDashboard');
    }

    public function getVehicles($vehicleType)
    {
        $id= VehicleType::where('name',$vehicleType)->pluck('id')->first();
        $vehicles=  VehicleType::find($id)->vehicles;
        //print_r($vehicles);
        return response()->json([
            'vehicles' => $vehicles
        ]);
    }

    public function getPassengerName($id)
    {
        $name = Booking::find($id)->Pname;
        return response()->json([
            'name' => $name
        ]);
    }
}
