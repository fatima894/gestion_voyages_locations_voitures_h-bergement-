<?php

namespace App\Http\Controllers\Secretary;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class ManageCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = DB::table('car_reservations')
        ->join('users', 'car_reservations.customer_id', '=', 'users.id')
        ->join('car_details', 'car_reservations.reservation_car_id', '=', 'car_details.car_id')
        ->join('street_addresses' , 'street_addresses.street_id','=','car_details.adress_id')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->join('car_companies' , 'car_companies.car_company_id','=','car_details.company_id')
        ->get();
        return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('status', function($row){

                    if($row->status ==='active'){
                       $btn ='<h5 class="text-success ">Active</h5>';
                    }else if($row->status ==='wait'){
                       $btn = ' <a href="/confirm_car_cancel/'.$row->car_reservation_id.'" data-toggle="tooltip"  data-id="'.$row->car_reservation_id.'" data-original-title="Delete" class="btn btn-danger btn-sm confirmCancel">Confirm the Cancel</a>';
                    }else{
                       $btn ='<h5 class="text-secondary">Cancelled</h5>';
                    }
                    return $btn;
                    
                   })
           
                ->rawColumns(['status'])
                       ->make(true);

        }


        return view('Secretary.Manage_cars');

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
    public function edit($car_reservation_id)
    {
        $car = DB::table('car_reservations')
        ->where('car_reservation_id', $car_reservation_id)
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
