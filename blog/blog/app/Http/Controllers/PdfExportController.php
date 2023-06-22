<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Auth;

class PdfExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mode)
    {
    
        $customerId = Auth::user()->id;

        $user = DB::table('users')
        ->where('id', $customerId)
        ->get();

        $cars = DB::table('car_reservations')
        ->join('users', 'car_reservations.customer_id', '=', 'users.id')
        ->join('car_details', 'car_reservations.reservation_car_id', '=', 'car_details.car_id')
        ->join('street_addresses' , 'street_addresses.street_id','=','car_details.adress_id')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->join('car_companies' , 'car_companies.car_company_id','=','car_details.company_id')
        ->where('customer_id', $customerId)
        ->where('status', $mode)
        ->get();



        $flights = DB::table('flight_reservations')
        ->join('travel_details', 'flight_reservations.flight_detail_id', '=', 'travel_details.travel_detail_id')
        ->join('travel_companies' , 'travel_companies.company_id','=','travel_details.airline_company')
        ->join('directions' , 'directions.direction_id','=','travel_details.direction_id')
        ->join('airports as to_airport' , 'to_airport.airport_id','=','directions.to_airport_id')
        ->join('airports as from_airport' , 'from_airport.airport_id','=','directions.from_airport_id')
        ->join('street_addresses as to_street_address' , 'to_street_address.street_id','=','to_airport.street_id')
        ->join('street_addresses as from_street_address' , 'from_street_address.street_id','=','from_airport.street_id')
        ->join('cities as to_city' , 'to_city.city_id','=','to_street_address.city_id')
        ->join('cities as from_city' , 'from_city.city_id','=','from_street_address.city_id')
        ->join('countries as to_counrty' , 'to_counrty.country_id','=','to_city.country_id')
        ->join('countries as from_counrty' , 'from_counrty.country_id','=','from_city.country_id')
        ->where('customer_id', $customerId)
        ->where('status', $mode)
        ->get(['flight_reservation_id','reservation_price','status','travel_details.travel_detail_id','travel_companies.company_name','to_airport.airport_name as t','from_airport.airport_name as f'
        ,'travel_details.travel_date','travel_details.price','travel_details.travel_time','travel_details.reach_time','to_city.city_name as to_city',
        'from_city.city_name as from_city','directions.to_airport_id']);
        
        



        $houses =  DB::table('house_reservations')
        ->join('rooms', 'house_reservations.room_id', '=', 'rooms.room_id')
        ->join('housing_infos' , 'housing_infos.house_info_id','=','rooms.house_id')
        ->join('housing_types' , 'housing_infos.type','=','housing_types.id')
        ->join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->where('customer_id', $customerId)
        ->where('status', $mode)
        ->get();

         $pdf_Name = $user[0]->name.'-'.Carbon::now();

        $pdf = PDF::loadView('pdf.customer_pdf',[

            'user'=>$user,
            'mode'=>$mode,
            'cars'=>$cars,
            'flights'=>$flights,
            'houses'=>$houses
        ]);
        return $pdf->download($pdf_Name.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
