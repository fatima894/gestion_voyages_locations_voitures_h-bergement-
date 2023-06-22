<?php

namespace App\Http\Controllers\Searchs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel_detail;

class FlightSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $from_where = $request->where_from;
         $to_where = $request->where_to;
         $date = $request->date;

        $data = Travel_detail::join('directions' , 'directions.direction_id','=','travel_details.direction_id')
        ->join('airports as to_airport' , 'to_airport.airport_id','=','directions.to_airport_id')
        ->join('airports as from_airport' , 'from_airport.airport_id','=','directions.from_airport_id')
        ->join('street_addresses as to_street_address' , 'to_street_address.street_id','=','to_airport.street_id')
        ->join('street_addresses as from_street_address' , 'from_street_address.street_id','=','from_airport.street_id')
        ->join('cities as to_city' , 'to_city.city_id','=','to_street_address.city_id')
        ->join('cities as from_city' , 'from_city.city_id','=','from_street_address.city_id')
        ->join('countries as to_counrty' , 'to_counrty.country_id','=','to_city.country_id')
        ->join('countries as from_counrty' , 'from_counrty.country_id','=','from_city.country_id')
        ->join('travel_companies' , 'travel_companies.company_id','=','travel_details.airline_company')
        ->where('from_city.city_name', '=', $from_where)
        ->where('to_city.city_name', '=', $to_where)
        ->where('travel_details.travel_date', '=', $date)
        ->get(['travel_details.travel_detail_id','travel_companies.company_name','travel_companies.photo','to_airport.airport_name as t','from_airport.airport_name as f'
        ,'travel_details.travel_date','travel_details.price','travel_details.travel_time','travel_details.reach_time','to_city.city_name as to_city',
        'from_city.city_name as from_city','directions.to_airport_id']);


            return view('search.flight_search_result', compact('data'));
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
