<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function vehicleDetails()
    {
        return view('admin.vehicleDetails');
    }

    public function vehicleTypeCreate()
    {
        return view('admin.vehicleTypeCreate');
    }

    public function vehicleCreate()
    {
        return view('admin.vehicleCreate');
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
