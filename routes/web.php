<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  --------------------------
//  ROUTE FOR ADMIN DASHBOARD
//  --------------------------
Route::get('admin', 'HomeController@admin')->name('admin')->middleware('admin');
Route::get('admin/dashboard', 'AdminController@adminDashboard')->name('adminDashboard')->middleware('admin');

// Route::get('admin/agent/details', 'AdminController@agentDetails')->name('agentDetails')->middleware('admin');
// Route::get('admin/agent/create', 'AdminController@agentCreate')->name('agentCreate')->middleware('admin');

Route::resource('admin/agent', 'AgentController');


Route::resource('admin/vehicleType', 'VehicleTypeController');

Route::resource('admin/vehicleFacilities', 'FacilitiesController');
Route::get('admin/facilities/{id}','FacilitiesController@vehicleFacilitiesCreate')->name('vehicleFacilitiesCreate');

// Route::get('admin/vehicle/details', 'AdminController@vehicleDetails')->name('vehicleDetails')->middleware('admin');
// Route::get('admin/vehicle/type/create', 'AdminController@vehicleTypeCreate')->name('vehicleTypeCreate')->middleware('admin');
Route::get('admin/vehicle/create', 'AdminController@vehicleCreate')->name('vehicleCreate')->middleware('admin');


Route::get('admin/offers/details', 'AdminController@offersDetails')->name('offersDetails')->middleware('admin');
Route::get('admin/offers/create', 'AdminController@offersCreate')->name('offersCreate')->middleware('admin');


Route::get('admin/employee/details', 'AdminController@employeeDetails')->name('employeeDetails')->middleware('admin');
Route::get('admin/employee/create', 'AdminController@employeeCreate')->name('employeeCreate')->middleware('admin');