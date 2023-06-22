<?php

namespace App\Http\Controllers\Reservations;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\house_reservation;

use Auth;

class HotelReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($room_id,$check_in_date,$check_out_date,$price)
    {
        $to = \Carbon\Carbon::parse($check_in_date);
        $from = \Carbon\Carbon::parse($check_out_date);
        $days = $to->diffInDays($from);

        $new_house_reservation = new house_reservation;
        $new_house_reservation->customer_id = Auth::user()->id;
        $new_house_reservation->room_id = $room_id;
        $new_house_reservation->check_in_date = $check_in_date;
        $new_house_reservation->check_out_date = $check_out_date;
        $new_house_reservation->days = $days;
        $new_house_reservation->reservation_price = ($days * $price);
        $new_house_reservation->save();

        return redirect('/customer/dashboard/hotels');
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
        
        $to = \Carbon\Carbon::parse($request->check_in_date);
        $from = \Carbon\Carbon::parse($request->check_out_date);
        $days = $to->diffInDays($from);
        
        
        $new_house_reservation = new house_reservation;
        $new_house_reservation->customer_id = Auth::user()->id;
        $new_house_reservation->room_id = $request->room_id;
        $new_house_reservation->check_in_date = $request->check_in_date;
        $new_house_reservation->check_out_date = $request->check_out_date;
        $new_house_reservation->days = $days;
        $new_house_reservation->reservation_price = ($days * $request->price);
        $new_house_reservation->save();

        return redirect('/customer/dashboard/hotels');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getdata($id)
    {
        $data = DB::table('rooms')->where('room_id',$id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($house_reservation_id)
    {
        
        $hotel = DB::table('house_reservations')
        ->where('house_reservation_id', $house_reservation_id)
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
