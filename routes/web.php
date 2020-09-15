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

//  -----------------
//  ROUTE FOR AGENT
//  -----------------
Route::resource('admin/agent', 'AgentController');

//  -----------------------
//  ROUTE FOR VEHICLE TYPE
//  -----------------------
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

//  ------------------
//  ROUTE FOR BOOKING
//  ------------------
Route::resource('admin/booking', 'BookingController');

//  -----------------------------------------------
//  ROUTE FOR GETTING VEHICLE OF GIVEN VEHICLE TYPE
//  -----------------------------------------------
// Route::get('/vehicleTypes','HomeController@getVehicleTypes');
Route::get('/vehicleType/{vehicleType}/vehicles','HomeController@getVehicles');

//  --------------------------
//  ROUTE FOR BOOKING BY USER
//  --------------------------
Route::resource('user/userBooking', 'UserBookingController');

//  ------------------
//  ROUTE FOR REFUND
//  ------------------
Route::resource('admin/refund', 'RefundController');


//  ---------------------------------------------------
//  ROUTE FOR GETTING PASSENGER'S NAME OF BOOKING ID-X
//  ---------------------------------------------------
Route::get('/booking/{id}/refund','HomeController@getPassengerName');


//  --------------------------------
//  ROUTE FOR GETTING NOTIFICATIONS
//  --------------------------------
Route::post('/notification/get', 'HomeController@getNotifications');

//  --------------------------
//  ROUTE FOR BOOKING CANCEL
//  --------------------------
Route::get('/cancel/booking','BookingController@cancel')->name('bookingCancel');
Route::post('/cancel/booking','BookingController@cancelBooking')->name('booking.Cancel');

Route::post('admin/employee/create', 'AdminController@employeeCreate')->name('employeeCreate')->middleware('admin');

