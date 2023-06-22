<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;

class ShowHouseController extends Controller
{
    public function index()
    {
        $showhouse = room::join('housing_infos' , 'housing_infos.house_info_id','=','rooms.house_id')
        ->join('housing_types' , 'housing_types.id','=','housing_infos.type')
        ->join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->where('rooms.show_at_page', '=', 1)
        ->get();
        
        return view('search.house_search', compact('showhouse'));
    }
}
