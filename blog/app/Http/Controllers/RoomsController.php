<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;
use App\Models\housing_info;
use Illuminate\Support\Facades\DB;
use DataTables;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $data = room::join('housing_infos' , 'housing_infos.house_info_id','=','rooms.house_id')
        ->join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->get();

        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->room_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editRoom">Modifier</a>';
                    if($row->show_at_page === 0 ){
                    $btn = $btn.' <a href="/room/show/'.$row->room_id.'" data-toggle="tooltip"  data-id="'.$row->room_id.'" data-original-title="Show" class="btn btn-success btn-sm deleteRoom">Afficher</a>';
                    }else{
                    $btn = $btn.' <a href="/room/hide/'.$row->room_id.'" data-toggle="tooltip"  data-id="'.$row->room_id.'" data-original-title="Hide" class="btn btn-secondary btn-sm deleteRoom">Cacher</a>';
                    }
                    $btn = $btn.' <a href="/room/delete/'.$row->room_id.'" data-toggle="tooltip"  data-id="'.$row->room_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteRoom">Supprimer</a>';

                    return $btn;

            })

            ->rawColumns(['action'])
                        ->make(true);

        }


        $houses = housing_info::join('street_addresses' , 'street_addresses.street_id','=','housing_infos.adresse')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->get();

        return view('Management.Rooms.rooms', compact('houses'));
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


    if($file = $request->hasFile('photo')) {

            $file = $request->file('photo') ;
            $fileName = $file->getClientOriginalName() ;// للحصول على اسم الصورة
            $request->file('photo')->storeAs('public/images/',$fileName); //لحفظ الصورة في داخل مجلد البابليك

            $newRoom->photo = $fileName ; // لحفظ نفس اسم الصورة في الداتابيس

            room::updateOrCreate(
                ['room_id' => $request->room_id],
                ['house_id' => $request->house_id,
                'room_size' => $request->roomsize,
                'price' => $request->price,
                'persons_per_room' => $request->persons_per_room,
                'photo' => $fileName,
                ]);
            return response()->json(['success'=>'Product saved successfully.']);


    }else{


        room::updateOrCreate(
            ['room_id' => $request->room_id],
            ['house_id' => $request->house_id,
            'room_size' => $request->roomsize,
            'price' => $request->price,
            'persons_per_room' => $request->persons_per_room,
            'photo' => '',]);

        return response()->json(['success'=>'Product saved successfully.']);

    }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::table('rooms')->where('room_id',$id)
        ->update([
            'show_at_page' => 1,
                ]);

        return redirect()->back();
    }


    public function hide($id)
    {
        DB::table('rooms')->where('room_id',$id)
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
        $data = DB::table('rooms')->where('room_id',$id)->get();

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
        DB::table('rooms')->where('room_id',$id)
        ->update([  'house_id' => $request->house_id ,
                    'room_size' => $request->roomsize ,
                    'price' => $request->price ,
                    'persons_per_room' => $request->persons_per_room ,
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
        $room = room::where('room_id',$id)->delete();

        return redirect()->back();
    }
}
