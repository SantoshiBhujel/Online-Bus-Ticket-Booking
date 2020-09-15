<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.dashboard');
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
