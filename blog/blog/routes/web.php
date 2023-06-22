<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\AppartementsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetadresseController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\DirectionsController;
use App\Http\Controllers\VillasController;
use App\Http\Controllers\CarsCompanyController;
use App\Http\Controllers\TravelCompanyController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\CarDetailsController;
use App\Http\Controllers\TravelDetailsController;
use App\Http\Controllers\TravelOfferManagmentsController;
use App\Http\Controllers\AddTravelOffersController;
use App\Http\Controllers\CustomerDetailsController;
use App\Http\Controllers\ShowHouseController;
use App\Http\Controllers\ShowTravelController;
use App\Http\Controllers\ShowCarController;


use App\Http\Controllers\Reservations\CarReservationController;
use App\Http\Controllers\Reservations\flightReservationController;
use App\Http\Controllers\Reservations\HotelReservationController;

use App\Http\Controllers\Travels_offersController;
use App\Http\Controllers\Searchs\HouseSearchController;
use App\Http\Controllers\Searchs\FlightSearchController;
use App\Http\Controllers\Searchs\CarSearchController;



use App\Http\Controllers\CustomerDashboard\CustomerCarDashboardController;
use App\Http\Controllers\CustomerDashboard\CustomerFlightDashboardController;
use App\Http\Controllers\CustomerDashboard\CustomerHotelDashboardController;


use App\Http\Controllers\Secretary\ManageHouseController;
use App\Http\Controllers\Secretary\ManageCarController;
use App\Http\Controllers\Secretary\ManageTravelController;


use App\Http\Controllers\PdfExportController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ApprovalPaymentController;






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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('admin');

Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index')->middleware('admin');
Route::prefix('/hotel')->group(function () {
    Route::post('/store', [HotelsController::class, 'store']);
    Route::get('/edit/{id}', [HotelsController::class, 'edit']);
    Route::post('/update/{id}', [HotelsController::class, 'update']);
    Route::get('/delete/{id}', [HotelsController::class, 'destroy']);
});


Route::get('/appartements', [AppartementsController::class, 'index'])->name('appartements.index')->middleware('admin');
Route::prefix('/appartement')->group(function () {
    Route::post('/store', [AppartementsController::class, 'store']);
    Route::get('/edit/{id}', [AppartementsController::class, 'edit']);
    Route::post('/update/{id}', [AppartementsController::class, 'update']);
    Route::get('/delete/{id}', [AppartementsController::class, 'destroy']);
});

Route::get('/villas', [VillasController::class, 'index'])->name('villas.index')->middleware('admin');

Route::prefix('/villa')->group(function () {
    Route::post('/store', [VillasController::class, 'store']);
    Route::get('/edit/{id}', [VillasController::class, 'edit']);
    Route::post('/update/{id}', [VillasController::class, 'update']);
    Route::get('/delete/{id}', [VillasController::class, 'destroy']);
});



Route::get('/countries', [CountryController::class, 'index'])->name('countries.index')->middleware('admin');
Route::prefix('/country')->group(function () {
    Route::post('/store', [CountryController::class, 'store']);
    Route::get('/edit/{id}', [CountryController::class, 'edit']);
    Route::post('/update/{id}', [CountryController::class, 'update']);
    Route::get('/delete/{id}', [CountryController::class, 'destroy']);
});

Route::get('/cities', [CityController::class, 'index'])->name('cities.index')->middleware('admin');
Route::prefix('/city')->group(function () {
    Route::post('/store', [CityController::class, 'store']);
    Route::get('/edit/{id}', [CityController::class, 'edit']);
    Route::post('/update/{id}', [CityController::class, 'update']);
    Route::get('/delete/{id}', [CityController::class, 'destroy']);
});

Route::get('/addresses', [StreetadresseController::class, 'index'])->name('addresses.index')->middleware('admin');
Route::prefix('/address')->group(function () {
    Route::post('/store', [StreetadresseController::class, 'store']);
    Route::get('/edit/{id}', [StreetadresseController::class, 'edit']);
    Route::post('/update/{id}', [StreetadresseController::class, 'update']);
    Route::get('/delete/{id}', [StreetadresseController::class, 'destroy']);
});

// Airports

Route::get('/airports', [AirportsController::class, 'index'])->name('airports.index')->middleware('admin');
Route::prefix('/airport')->group(function () {
    Route::post('/store', [AirportsController::class, 'store']);
    Route::get('/edit/{id}', [AirportsController::class, 'edit']);
    Route::post('/update/{id}', [AirportsController::class, 'update']);
    Route::get('/delete/{id}', [AirportsController::class, 'destroy']);
});

//Direction
Route::get('/directions', [DirectionsController::class, 'index'])->name('directions.index')->middleware('admin');
Route::prefix('/direction')->group(function () {
    Route::post('/store', [DirectionsController::class, 'store']);
    Route::get('/edit/{id}', [DirectionsController::class, 'edit']);
    Route::post('/update/{id}', [DirectionsController::class, 'update']);
    Route::get('/delete/{id}', [DirectionsController::class, 'destroy']);
});



Route::get('/car_companies', [CarsCompanyController::class, 'index'])->name('car_companies.index')->middleware('admin');
Route::prefix('/car_company')->group(function () {
    Route::post('/store', [CarsCompanyController::class, 'store']);
    Route::get('/edit/{id}', [CarsCompanyController::class, 'edit']);
    Route::post('/update/{id}', [CarsCompanyController::class, 'update']);
    Route::get('/delete/{id}', [CarsCompanyController::class, 'destroy']);
});


Route::get('/travel_companies', [TravelCompanyController::class, 'index'])->name('travel_companies.index')->middleware('admin');
Route::prefix('/travel_company')->group(function () {
    Route::post('/store', [TravelCompanyController::class, 'store']);
    Route::get('/edit/{id}', [TravelCompanyController::class, 'edit']);
    Route::post('/update/{id}', [TravelCompanyController::class, 'update']);
    Route::get('/delete/{id}', [TravelCompanyController::class, 'destroy']);
});


Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index')->middleware('admin');
Route::prefix('/room')->group(function () {
    Route::post('/store', [RoomsController::class, 'store']);
    Route::get('/edit/{id}', [RoomsController::class, 'edit']);
    Route::post('/update/{id}', [RoomsController::class, 'update']);
    Route::get('/delete/{id}', [RoomsController::class, 'destroy']);
    Route::get('/show/{id}', [RoomsController::class, 'show']);
    Route::get('/hide/{id}', [RoomsController::class, 'hide']);
});






Route::get('/cardetails', [CarDetailsController::class, 'index'])->name('cardetails.index')->middleware('admin');
Route::prefix('/cardetail')->group(function () {
    Route::post('/store', [CarDetailsController::class, 'store']);
    Route::get('/edit/{id}', [CarDetailsController::class, 'edit']);
    Route::post('/update/{id}', [CarDetailsController::class, 'update']);
    Route::get('/delete/{id}', [CarDetailsController::class, 'destroy']);
    Route::get('/show/{id}', [CarDetailsController::class, 'show']);
    Route::get('/hide/{id}', [CarDetailsController::class, 'hide']);
});


Route::get('/traveldetails', [TravelDetailsController::class, 'index'])->name('traveldetails.index')->middleware('admin');
Route::prefix('/traveldetail')->group(function () {
    Route::post('/store', [TravelDetailsController::class, 'store']);
    Route::get('/edit/{id}', [TravelDetailsController::class, 'edit']);
    Route::post('/update/{id}', [TravelDetailsController::class, 'update']);
    Route::get('/delete/{id}', [TravelDetailsController::class, 'destroy']);
    Route::get('/show/{id}', [TravelDetailsController::class, 'show']);
    Route::get('/hide/{id}', [TravelDetailsController::class, 'hide']);
});


Route::get('/traveloffers', [TravelOfferManagmentsController::class, 'index'])->name('traveloffers.index')->middleware('admin');
Route::prefix('/traveloffer')->group(function () {
    Route::post('/store/{id}', [TravelOfferManagmentsController::class, 'store']);
    Route::get('/edit/{id}', [TravelOfferManagmentsController::class, 'edit']);
    Route::post('/update/{id}', [TravelOfferManagmentsController::class, 'update']);
    Route::get('/delete/{id}', [TravelOfferManagmentsController::class, 'destroy']);
});


Route::get('/addtraveloffers/{id}', [AddTravelOffersController::class, 'index'])->middleware('admin');






Route::get('/reserve_car/{car_id}/{pick_up_date}/{pick_up_time}/{return_date}/{return_date_time}/{price}', [CarReservationController::class, 'index']);
Route::get('/reserve_car/getdata/{car_id}', [CarReservationController::class, 'getdata']);
Route::post('/reserve_car/store', [CarReservationController::class, 'store'])->middleware('auth');
Route::get('/reserve_car_cancel/{car_reservation_id}', [CarReservationController::class, 'edit']);

Route::get('/reserve_flight/{travel_detail_id}/{price}', [flightReservationController::class, 'index'])->middleware('auth');
Route::get('/reserve_flight_cancel/{flight_reservation_id}', [flightReservationController::class, 'edit']);

Route::get('/reserve_hotel/{room_id}/{check_in_date}/{check_out_date}/{price}', [HotelReservationController::class, 'index']);
Route::get('/reserve_hotel/getdata/{room_id}', [HotelReservationController::class, 'getdata']);
Route::post('/reserve_hotel/store', [HotelReservationController::class, 'store'])->middleware('auth');
Route::get('/reserve_hotel_cancel/{house_reservation_id}', [HotelReservationController::class, 'edit']);



Route::get('/customer/dashboard', function () {
    return view('customer.customer_dashboard');
});



Route::get('/customer/dashboard/cars', [CustomerCarDashboardController::class, 'index']);


Route::get('/customer/dashboard/hotels', [CustomerHotelDashboardController::class, 'index']);


Route::get('/customer/dashboard/flights', [CustomerFlightDashboardController::class, 'index']);




Route::get('/', [Travels_offersController::class, 'index'])->name('homePage');



/*  Search houses */
Route::get('/houses', [ShowHouseController::class, 'index']);
Route::post('/houses_results', [HouseSearchController::class, 'index']);



/*  Search flights */
Route::get('/flights', [ShowTravelController::class, 'index']);
Route::post('/flights_results', [FlightSearchController::class, 'index']);



/*  Search cars */
Route::get('/cars', [ShowCarController::class, 'index']);
Route::post('/cars_results', [CarSearchController::class, 'index']);




Route::get('/Secretary/houses_managment', [ManageHouseController::class, 'index'])->name('reserve_house.index')->middleware('secretary');
Route::get('/confirm_house_cancel/{house_reservation_id}', [ManageHouseController::class, 'edit']);
Route::get('/Secretary/cars_managment', [ManageCarController::class, 'index'])->name('reserve_car.index')->middleware('secretary');
Route::get('/confirm_car_cancel/{car_reservation_id}', [ManageCarController::class, 'edit']);
Route::get('/Secretary/travels_managment', [ManageTravelController::class, 'index'])->name('reserve_travel.index')->middleware('secretary');
Route::get('/confirm_travel_cancel/{travel_reservation_id}', [ManageTravelController::class, 'edit']);


Route::get('/customer_details', [CustomerDetailsController::class, 'index'])->name('customer_details.index')->middleware('secretary');


Route::get('/export_customer_pdf/{mode}', [PdfExportController::class, 'index']);

Route::post('/paypal', [PaypalController::class, 'index'])->name('paypal_call');
Route::get('/paypal/return/{record_id}/{type}', [PaypalController::class, 'paypalReturn'])->name('paypay_return');
Route::get('/paypal/cancel', [PaypalController::class, 'paypalCancel'])->name('paypay_cancel');


Route::get('/paypal/approval/{record_id}/{type}', [ApprovalPaymentController::class, 'approval'])->name('payment_approval');
