<?php

namespace App\Http\Controllers;
use App\Models\Direction;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Direction::join('airports as from_airport' , 'from_airport.airport_id','=','directions.from_airport_id')
        ->join('airports as to_airport' , 'to_airport.airport_id','=','directions.to_airport_id')
        ->get(['directions.direction_id','from_airport.airport_name as f','to_airport.airport_name as t']);

        return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->direction_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editDirection">Modifier</a>';

                    $btn = $btn.' <a href="/direction/delete/'.$row->direction_id.'" data-toggle="tooltip"  data-id="'.$row->direction_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteDirection">Supprimer</a>';



                          return $btn;

                     })

                  ->rawColumns(['action'])
                        ->make(true);
        }
        $allAirports= Airport::all();
        return view('Management.Directions.direction', compact('allAirports'));
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
        $newDirection = new Direction;
        $newDirection ->from_airport_id = $request->from_airport;
        $newDirection ->to_airport_id = $request->to_airport;
        $newDirection->save();

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
        $data = DB::table('directions')->where('direction_id',$id)->get();

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
        DB::table('directions')->where('direction_id',$id)
        ->update(['from_airport_id' => $request->from_airport ,
                  'to_airport_id' => $request->to_airport ,
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
        $direction = Direction::where('direction_id',$id)->delete();

        return redirect()->back();
    }
}
