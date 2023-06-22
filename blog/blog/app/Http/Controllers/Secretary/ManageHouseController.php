<?php

namespace App\Http\Controllers\Secretary;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class ManageHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = DB::table('house_reservations')
        ->join('users', 'house_reservations.customer_id', '=', 'users.id')
        ->join('rooms', 'house_reservations.room_id', '=', 'rooms.room_id')
        ->join('housing_infos' , 'housing_infos.house_info_id','=','rooms.house_id')
        ->join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('status', function($row){

         if($row->status ==='active'){
            $btn ='<h5 class="text-success">Active</h5>';
         }else if($row->status ==='wait'){
            $btn = ' <a href="/confirm_house_cancel/'.$row->house_reservation_id.'" data-toggle="tooltip"  data-id="'.$row->house_reservation_id.'" data-original-title="Delete" class="btn btn-danger btn-sm confirmCancel">Confirm the Cancel</a>';
         }else{
            $btn ='<h5 class="text-secondary">Cancelled</h5>';
         }
         return $btn;

        })

     ->rawColumns(['status'])
             ->make(true);

        }

        return view('Secretary.Manage_houses');
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
    public function edit($house_reservation_id)
    {
        $hotel = DB::table('house_reservations')
        ->where('house_reservation_id', $house_reservation_id)
        ->update(['status' => 'cancelled']);

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
