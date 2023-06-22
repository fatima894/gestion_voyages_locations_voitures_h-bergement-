<?php

namespace App\Http\Controllers;
use App\Models\Street_addresse;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $data = Airport::join('street_addresses' , 'street_addresses.street_id','=','airports.street_id')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->get(['street_addresses.street_id','street_addresses.street_name','airports.airport_id','airports.airport_name','cities.city_name','countries.country_name']);

        return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->airport_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editAirport">Modifier</a>';

                    $btn = $btn.' <a href="/airport/delete/'.$row->airport_id.'" data-toggle="tooltip"  data-id="'.$row->airport_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteAirport">Supprimer</a>';



                          return $btn;

                     })

                  ->rawColumns(['action'])
                       ->make(true);

        }

        $allStreetAddresses= Street_addresse::all();
        return view('Management.airports.airport', compact('allStreetAddresses'));
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
        $newAirport = new Airport;
        $newAirport ->airport_name = $request->name;
        $newAirport ->street_id = $request->street;
        $newAirport->save();

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
        $data = DB::table('airports')->where('airport_id',$id)->get();

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
        DB::table('airports')->where('airport_id',$id)
        ->update(['airport_name' => $request->name ,
                  'street_id' => $request->street ,
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
        $airport = Airport::where('airport_id',$id)->delete();
        return redirect()->back();
    }
}
