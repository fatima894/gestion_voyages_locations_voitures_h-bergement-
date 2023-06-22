<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = City::join('countries' , 'countries.country_id','=','cities.country_id')
        ->get(['countries.country_id','countries.country_name','cities.city_id','cities.city_name']);


        return Datatables::of($data)
        ->addColumn('action', function($row){


            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->city_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCity">Modifier</a>';

            $btn = $btn.' <a href="/city/delete/'.$row->city_id.'" data-toggle="tooltip"  data-id="'.$row->city_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCity">Supprimer</a>';



                  return $btn;

             })

          ->rawColumns(['action'])
                        ->make(true);
        }
        $allCountries= Country::all();
        return view('Management.Adresses.city', compact('allCountries'));
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
        $newCity = new City;
        $newCity ->city_name = $request->name;
        $newCity ->country_id = $request->country;
        $newCity->save();

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
        $data = DB::table('cities')->where('city_id',$id)->get();

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
        DB::table('cities')->where('city_id',$id)
        ->update(['city_name' => $request->name ,
                  'country_id' => $request->country,
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
        $city = City::where('city_id',$id)->delete();
        return redirect()->back();
    }
}
