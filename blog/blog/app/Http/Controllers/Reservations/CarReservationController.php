<?php

namespace App\Http\Controllers\Reservations;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\car_reservation;
use Auth;

class CarReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($car_id,$pick_up_date,$pick_up_time,$return_date,$return_date_time,$price)
    {
        
        $to = \Carbon\Carbon::parse($pick_up_date);
        $from = \Carbon\Carbon::parse($return_date);
        $days = $to->diffInDays($from);
        

        $new_car_reservation = new car_reservation;
        $new_car_reservation->customer_id = Auth::user()->id;
        $new_car_reservation->reservation_car_id = $car_id;
        $new_car_reservation->pickup_date = $pick_up_date;
        $new_car_reservation->pickup_time = $pick_up_time;
        $new_car_reservation->return_date = $return_date;
        $new_car_reservation->return_time = $return_date_time;
        $new_car_reservation->days = $days;
        $new_car_reservation->reservation_price = ($days * $price);
        $new_car_reservation->save();

        return redirect('/customer/dashboard/cars');

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata($id)
    {
        $data = DB::table('car_details')->where('car_id',$id)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $to = \Carbon\Carbon::parse($request->pick_up_date);
        $from = \Carbon\Carbon::parse($request->return_date);
        $days = $to->diffInDays($from);
        
        
        $new_car_reservation = new car_reservation;
        $new_car_reservation->customer_id = Auth::user()->id;
        $new_car_reservation->reservation_car_id = $request->car_id;
        $new_car_reservation->pickup_date = $request->pick_up_date;
        $new_car_reservation->pickup_time = $request->pick_up_time;
        $new_car_reservation->return_date = $request->return_date;
        $new_car_reservation->return_time = $request->return_date_time;
        $new_car_reservation->days = $days;
        $new_car_reservation->reservation_price = ($days * $request->price);
        $new_car_reservation->save();

        return redirect('/customer/dashboard/cars');
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
    public function edit($car_reservation_id)
    {
        $flight = DB::table('car_reservations')
        ->where('car_reservation_id', $car_reservation_id)
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
