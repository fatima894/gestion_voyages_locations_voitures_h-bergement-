<?php

namespace App\Http\Controllers\Searchs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\house_reservation;
use App\Models\room;

class HouseSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $type = $request->house_type;
         $city = $request->which_city;
         $check_in_date = $request->check_in_date;
         $check_out_date = $request->check_out_date;

        $data = room::join('housing_infos' , 'housing_infos.house_info_id','=','rooms.house_id')
        ->join('housing_types' , 'housing_types.id','=','housing_infos.type')
        ->join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        //->join('house_reservations' ,'house_reservations.room_id','!=', 'rooms.room_id')
        ->where('housing_infos.type', '=', $type)
        ->where('cities.city_name', '=', $city)
        ->get();

        return view('search.house_search_result' , compact('data','city','request'));

       
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
