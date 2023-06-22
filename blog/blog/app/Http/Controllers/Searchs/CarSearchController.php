<?php

namespace App\Http\Controllers\Searchs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Car_detail;


class CarSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from_where = $request->where_from;
        $pick_up_date = $request->pick_up_date;
        $pick_up_time = $request->pick_up_time;
        $return_date = $request->return_date;
        $return_date_time = $request->return_date_time;
          
       


        $data = Car_detail::join('street_addresses' , 'street_addresses.street_id','=','car_details.adress_id')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('car_companies' , 'car_companies.car_company_id','=','car_details.company_id')
        ->where('cities.city_name', '=', $from_where)
        ->get();


        return view('search.car_search_result' , compact('data','request'));




        
         
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
        $Car_detail = Car_detail::where('car_id',$id)->delete();

        return redirect()->back();
    }
}
