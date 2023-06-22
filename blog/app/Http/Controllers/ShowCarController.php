<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_detail;

class ShowCarController extends Controller
{
    public function index()
    {
        $showCars = Car_detail::join('street_addresses' , 'street_addresses.street_id','=','car_details.adress_id')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->join('car_companies' , 'car_companies.car_company_id','=','car_details.company_id')
        ->where('car_details.show_at_page', '=', 1)
        ->get();
        
        return view('search.car_search', compact('showCars'));
    }
}
