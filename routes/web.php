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

Route::resource('admin/agent', 'AgentController');


Route::resource('admin/vehicleType', 'VehicleTypeController');

//  -----------------------
//  ROUTE FOR VEHICLE TYPE
//  -----------------------
Route::resource('admin/vehicleFacilities', 'FacilitiesController');
Route::get('admin/facilities/{id}','FacilitiesController@vehicleFacilitiesCreate')->name('vehicleFacilitiesCreate');

//  --------------------------
//  ROUTE FOR VEHICLE
//  --------------------------
Route::resource('admin/vehicle', 'VehicleController');


//  --------------------------
//  ROUTE FOR EMPLOYEE TYPES
//  --------------------------
Route::resource('admin/employeeTypes', 'EmployeeTypeController');


//  --------------------------
//  ROUTE FOR DESTINATION 
//  --------------------------
Route::resource('admin/destination', 'DestinationController');
Route::get('admin/destination/{id}/previewEdit','DestinationController@previewEdit')->name('destination.previewEdit');
Route::post('admin/destination/{id}/previewUpdate','DestinationController@previewUpdate')->name('destination.previewUpdate');

//  -----------------
//  ROUTE FOR ROUTE 
//  ------------------
Route::resource('admin/route', 'RouteController');

//  -----------------
//  ROUTE FOR TRIP
//  ------------------
Route::resource('admin/trip', 'TripController');

//  -----------------
//  ROUTE FOR PRICE
//  ------------------
Route::resource('admin/price', 'PriceController');

//  -----------------
//  ROUTE FOR OFFERS
//  ------------------
Route::resource('admin/offer', 'OfferController');

Route::get('admin/employee/create', 'AdminController@employeeCreate')->name('employeeCreate')->middleware('admin');