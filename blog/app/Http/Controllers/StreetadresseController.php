<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Street_addresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class StreetadresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $data = Street_addresse::join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->get(['cities.city_id','cities.city_name','street_addresses.street_id','street_addresses.street_name']);


        return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){


                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->street_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editStreetAddress">Modifier</a>';

                            $btn = $btn.' <a href="/address/delete/'.$row->street_id.'" data-toggle="tooltip"  data-id="'.$row->street_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteStreetAddress">Supprimer</a>';



                                  return $btn;

                             })

                          ->rawColumns(['action'])
                        ->make(true);
        }
        $allCiities= City::all();
        return view('Management.Adresses.address', compact('allCiities'));
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
        $newStreet = new Street_addresse;
        $newStreet ->street_name = $request->name;
        $newStreet ->city_id = $request->city;
        $newStreet->save();

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
        $data = DB::table('street_addresses')->where('street_id',$id)->get();

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
        DB::table('street_addresses')->where('street_id',$id)
        ->update(['street_name' => $request->name ,

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
        $street_addresse = Street_addresse::where('street_id',$id)->delete();

        return redirect()->back();
    }
}
