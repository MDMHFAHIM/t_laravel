<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\Package_BookingController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\Hotel_BookingController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\FlightPriceController;
use App\Http\Controllers\Api\Flight_BookingController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\CatagoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Controllers\Api\RoomtypeController;
use App\Http\Controllers\Api\AirlineController;
use App\Http\Controllers\Api\VehicleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::post('register','_register');
    Route::post('login','_login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(PackageController::class)->group(function(){
    Route::get('package','index');
    Route::get('package/{package}','show');
    Route::post('package/edit/{package}','update');
    Route::delete('package/{package}','destroy');
    Route::post('package/create','store');
});

Route::controller(Package_BookingController::class)->group(function(){
    Route::get('package_booking','index');
    Route::get('package_booking/{package_booking}','show');
    Route::post('package_booking/edit/{package_booking}','update');
    Route::delete('package_booking/{package_booking}','destroy');
    Route::post('package_booking/create','store');
});

Route::controller(CustomerController::class)->group(function(){
    Route::get('customer','index');
    Route::get('customer/{customer}','show');
    Route::post('customer/edit/{customer}','update');
    Route::delete('customer/{customer}','destroy');
    Route::post('customer/create','store');
    Route::post('customer/login','_login');
});

Route::controller(HotelController::class)->group(function(){
    Route::get('hotel','index');
    Route::get('hotel/{hotel}','show');
    Route::post('hotel/edit/{hotel}','update');
    Route::delete('hotel/{hotel}','destroy');
    Route::post('hotel/create','store');
});

Route::controller(Hotel_BookingController::class)->group(function(){
    Route::get('hotel_booking','index');
    Route::get('hotel_booking/{hotel_booking}','show');
    Route::post('hotel_booking/edit/{hotel_booking}','update');
    Route::delete('hotel_booking/{hotel_booking}','destroy');
    Route::post('hotel_booking/create','store');
});

Route::controller(FlightController::class)->group(function(){
    Route::get('flight','index');
    Route::get('flight/{flight}','show');
    Route::post('flight/edit/{flight}','update');
    Route::delete('flight/{flight}','destroy');
    Route::post('flight/create','store');
});

Route::controller(FlightPriceController::class)->group(function(){
    Route::get('flightprice','index');
    Route::get('flightprice/{flightprice}','show');
    Route::post('flightprice/edit/{flightprice}','update');
    Route::delete('flightprice/{flightprice}','destroy');
    Route::post('flightprice/create','store');
});

Route::controller(Flight_BookingController::class)->group(function(){
    Route::get('flight_booking','index');
    Route::get('flight_booking/{flight_booking}','show');
    Route::post('flight_booking/edit/{flight_booking}','update');
    Route::delete('flight_booking/{flight_booking}','destroy');
    Route::post('flight_booking/create','store');
});

Route::controller(TransportController::class)->group(function(){
    Route::get('transport','index');
    Route::get('transport/{transport}','show');
    Route::post('transport/edit/{transport}','update');
    Route::delete('transport/{transport}','destroy');
    Route::post('transport/create','store');
});

Route::controller(Transport_BookingController::class)->group(function(){
    Route::get('transport_booking','index');
    Route::get('transport_booking/{transport_booking}','show');
    Route::post('transport_booking/edit/{transport_booking}','update');
    Route::delete('transport_booking/{transport_booking}','destroy');
    Route::post('transport_booking/create','store');
});

Route::controller(SubscriptionController::class)->group(function(){
    Route::get('subscription','index');
    Route::get('subscription/{subscription}','show');
    Route::post('subscription/edit/{subscription}','update');
    Route::delete('subscription/{subscription}','destroy');
    Route::post('subscription/create','store');
});

Route::controller(CatagoryController::class)->group(function(){
    Route::get('catagory','index');
    Route::get('catagory/{catagory}','show');
    Route::post('catagory/edit/{catagory}','update');
    Route::delete('catagory/{catagory}','destroy');
    Route::post('catagory/create','store');
});

Route::controller(CountryController::class)->group(function(){
    Route::get('country','index');
    Route::get('country/{country}','show');
    Route::post('country/edit/{country}','update');
    Route::delete('country/{country}','destroy');
    Route::post('country/create','store');
});

Route::controller(StateController::class)->group(function(){
    Route::get('state','index');
    Route::get('state/{state}','show');
    Route::post('state/edit/{state}','update');
    Route::delete('state/{state}','destroy');
    Route::post('state/create','store');
});

Route::controller(ZoneController::class)->group(function(){
    Route::get('zone','index');
    Route::get('zone/{zone}','show');
    Route::post('zone/edit/{zone}','update');
    Route::delete('zone/{zone}','destroy');
    Route::post('zone/create','store');
});

Route::controller(RoomtypeController::class)->group(function(){
    Route::get('roomtype','index');
    Route::get('roomtype/{roomtype}','show');
    Route::post('roomtype/edit/{roomtype}','update');
    Route::delete('roomtype/{roomtype}','destroy');
    Route::post('roomtype/create','store');
});

Route::controller(AirlineController::class)->group(function(){
    Route::get('airline','index');
    Route::get('airline/{airline}','show');
    Route::post('airline/edit/{airline}','update');
    Route::delete('airline/{airline}','destroy');
    Route::post('airline/create','store');
});

Route::controller(VehicleController::class)->group(function(){
    Route::get('vehicle','index');
    Route::get('vehicle/{vehicle}','show');
    Route::post('vehicle/edit/{vehicle}','update');
    Route::delete('vehicle/{vehicle}','destroy');
    Route::post('vehicle/create','store');
});
