<?php

namespace App\Http\Controllers;
use App\Models\housing_info;
use App\Models\housing_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $hotelType=housing_type::where('name','Hotel')->first()->id;
        $allHotels=housing_info::where('type',$hotelType)
        ->join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->get();

        return Datatables::of($allHotels)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->house_info_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editHotel">Modifier</a>';

                    $btn = $btn.' <a href="/hotel/delete/'.$row->house_info_id.'" data-toggle="tooltip"  data-id="'.$row->house_info_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteHotel">Supprimer</a>';



                     return $btn;

             })

             ->rawColumns(['action'])
                       ->make(true);
        }
        return view('Management.Hotels.hotels');


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
        $hotelType=housing_type::where('name','Hotel')->first()->id;

        $newHotel = new housing_info;
        $newHotel ->house_info_name=$request->name;
        $newHotel ->type=$hotelType;
        $newHotel ->adresse=$request->adresse;
        $newHotel ->email=$request->email;
        $newHotel ->tele=$request->tele;

        $newHotel->save();

        return redirect()->back();
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

        $data = DB::table('housing_infos')->where('house_info_id',$id)->get();

        return response()->json($data);
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
        DB::table('housing_infos')->where('house_info_id',$id)
                    ->update(['house_info_name' => $request->name ,
                              'adresse' => $request->adresse,
                              'email' => $request->email,
                              'tele' => $request->tele,
                            ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = housing_info::where('house_info_id',$id)->delete();

        return redirect()->back();

    }
}
