<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel_detail;
use App\Models\Travel_company;
use Illuminate\Support\Facades\DB;
use App\Models\Direction;
use DataTables;

class TravelDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $data = Travel_detail::join('travel_companies' , 'travel_companies.company_id','=','travel_details.airline_company')
        ->join('directions' , 'directions.direction_id','=','travel_details.direction_id')
        ->join('airports as to_airport' , 'to_airport.airport_id','=','directions.to_airport_id')
        ->join('airports as from_airport' , 'from_airport.airport_id','=','directions.from_airport_id')
        ->join('street_addresses as to_street_address' , 'to_street_address.street_id','=','to_airport.street_id')
        ->join('street_addresses as from_street_address' , 'from_street_address.street_id','=','from_airport.street_id')
        ->join('cities as to_city' , 'to_city.city_id','=','to_street_address.city_id')
        ->join('cities as from_city' , 'from_city.city_id','=','from_street_address.city_id')
        ->join('countries as to_counrty' , 'to_counrty.country_id','=','to_city.country_id')
        ->join('countries as from_counrty' , 'from_counrty.country_id','=','from_city.country_id')
        ->get(['travel_details.travel_detail_id','travel_companies.company_name','to_airport.airport_name as t','from_airport.airport_name as f'
        ,'travel_details.travel_date','travel_details.price','travel_details.travel_time','travel_details.reach_time','to_city.city_name as to_city',
        'from_city.city_name as from_city','directions.to_airport_id','travel_details.show_at_page']);

        return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->travel_detail_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editTravelDetail">Modifier</a>';
                    if($row->show_at_page === 0 ){
                        $btn = $btn.' <a href="/traveldetail/show/'.$row->travel_detail_id.'" data-toggle="tooltip"  data-id="'.$row->travel_detail_id.'" data-original-title="Show" class="btn btn-success btn-sm ShowTravelDetail">Afficher</a>';
                    }else{
                        $btn = $btn.' <a href="/traveldetail/hide/'.$row->travel_detail_id.'" data-toggle="tooltip"  data-id="'.$row->travel_detail_id.'" data-original-title="Hide" class="btn btn-secondary btn-sm HideTravelDetail">Cacher</a>';
                    }
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->travel_detail_id.'" data-original-title="Delete" class="btn btn-success btn-sm AddOffer">Ajouter offre</a>';

                    $btn = $btn.' <a href="/traveldetail/delete/'.$row->travel_detail_id.'" data-toggle="tooltip"  data-id="'.$row->travel_detail_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTravelDetail">Supprimer</a>';

                    return $btn;

                     })

                  ->rawColumns(['action'])
                       ->make(true);

        }

        $directions = direction::join('airports as to_airport' , 'to_airport.airport_id','=','directions.to_airport_id')
        ->join('airports as from_airport' , 'from_airport.airport_id','=','directions.from_airport_id')
        ->join('street_addresses as to_street_address' , 'to_street_address.street_id','=','to_airport.street_id')
        ->join('street_addresses as from_street_address' , 'from_street_address.street_id','=','from_airport.street_id')
        ->join('cities as to_city' , 'to_city.city_id','=','to_street_address.city_id')
        ->join('cities as from_city' , 'from_city.city_id','=','from_street_address.city_id')
        ->get(['to_city.city_name as to_city','from_city.city_name as from_city','directions.direction_id']);

        $travel_companies = Travel_company::all();

        return view('Management.travels.travel_detail', compact('travel_companies','directions'));
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


        $traveldetail = new Travel_detail;
        $traveldetail->airline_company = $request->company_id;
        $traveldetail->direction_id = $request->from_to;
        $traveldetail->travel_date = $request->travel_date;
        $traveldetail->travel_time = $request->travel_time;
        $traveldetail->reach_time = $request->reach_time;
        $traveldetail->price = $request->price;


        if($file = $request->hasFile('photo')) {

            $file = $request->file('photo') ;
            $fileName = $file->getClientOriginalName() ;// للحصول على اسم الصورة
            $request->file('photo')->storeAs('public/images/',$fileName); //لحفظ الصورة في داخل مجلد البابليك

            $traveldetail->photo = $fileName ; // لحفظ نفس اسم الصورة في الداتابيس

    }


        $traveldetail->save();
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
        DB::table('travel_details')->where('travel_detail_id',$id)
        ->update([
            'show_at_page' => 1,
                ]);

        return redirect()->back();
    }


    public function hide($id)
    {
        DB::table('travel_details')->where('travel_detail_id',$id)
        ->update([
            'show_at_page' => 0,
                ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('travel_details')->where('travel_detail_id',$id)->get();

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
        DB::table('travel_details')->where('travel_detail_id',$id)
        ->update(['airline_company' => $request->company_id ,
                  'direction_id' => $request->from_to ,
                  'travel_date' => $request->travel_date ,
                  'travel_time' => $request->travel_time ,
                  'reach_time' => $request->reach_time ,
                  'price' => $request->price ,

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
        $traveldetail = Travel_detail::where('travel_detail_id',$id)->delete();
        return redirect()->back();
    }
}
