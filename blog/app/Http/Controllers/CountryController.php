<?php


namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use DataTables;



class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $allCountries = Country::all();

        return Datatables::of($allCountries)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){


                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->country_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCountry">Modifier</a>';

                        $btn = $btn.' <a href="/country/delete/'.$row->country_id.'" data-toggle="tooltip"  data-id="'.$row->country_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCountry">Supprimer</a>';



                                return $btn;

                            })

                        ->rawColumns(['action'])
                        ->make(true);


        }
        return view('Management.Adresses.country');
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


        $newCounrty = new Country;
        $newCounrty ->country_name = $request->name;
        $newCounrty->save();

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
        $data = DB::table('countries')->where('country_id',$id)->get();

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
        DB::table('countries')->where('country_id',$id)
        ->update(['country_name' => $request->name ,

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
        $Country = Country::where('country_id',$id)->delete();

        return redirect()->back();
    }
}
