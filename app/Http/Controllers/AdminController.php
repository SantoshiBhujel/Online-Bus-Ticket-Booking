<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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

    public function adminDashboard()
    {
        $notifications = Auth::user()->unreadNotifications;  
        return view('admin.dashboard',compact('notifications'));
    }

    public function employeeDetails()
    {
        return view('admin.employeeDetails');
    }

    public function employeeCreate()
    {
        return view('admin.employeeCreate');
    }
    
}
