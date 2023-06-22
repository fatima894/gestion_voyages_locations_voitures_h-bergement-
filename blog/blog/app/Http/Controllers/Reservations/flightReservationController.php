<?php

namespace App\Http\Controllers\Reservations;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\flight_reservation;

use Auth;

class flightReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($travel_detail_id,$price)
    {
        $new_flight_reservation = new flight_reservation;
        $new_flight_reservation->customer_id = Auth::user()->id;
        $new_flight_reservation->flight_detail_id = $travel_detail_id;
        $new_flight_reservation->reservation_price = $price;
       
        $new_flight_reservation->save();

        return redirect('/customer/dashboard/flights');
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
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function edit($flight_reservation_id)
    {
        
        

        $flight = DB::table('flight_reservations')
                ->where('flight_reservation_id', $flight_reservation_id)
                ->update(['status' => 'wait']);

        return redirect()->back();
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
