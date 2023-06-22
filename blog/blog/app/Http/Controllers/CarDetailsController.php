<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_detail;
use App\Models\car_company;
use App\Models\Street_addresse;
use Illuminate\Support\Facades\DB;
use DataTables;
use File;

class CarDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Car_detail::join('street_addresses' , 'street_addresses.street_id','=','car_details.adress_id')
        ->join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->join('car_companies' , 'car_companies.car_company_id','=','car_details.company_id')
        ->get();

        return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->car_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCarDetail">Modifier</a>';
                    if($row->show_at_page === 0 ){
                        $btn = $btn.' <a href="/cardetail/show/'.$row->car_id.'" data-toggle="tooltip"  data-id="'.$row->car_id.'" data-original-title="Show" class="btn btn-success btn-sm ShowCarDetail">Afficher</a>';
                    }else{
                        $btn = $btn.' <a href="/cardetail/hide/'.$row->car_id.'" data-toggle="tooltip"  data-id="'.$row->car_id.'" data-original-title="Hide" class="btn btn-secondary btn-sm HideCarDetail">Cacher</a>';
                    }
                    $btn = $btn.' <a href="/cardetail/delete/'.$row->car_id.'" data-toggle="tooltip"  data-id="'.$row->car_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCarDetail">Supprimer</a>';



                          return $btn;

                     })

                  ->rawColumns(['action'])
                       ->make(true);

        }


        $car_companies = car_company::all();

        $addresses = Street_addresse::join('cities' , 'cities.city_id','=','street_addresses.city_id')
        ->join('countries' , 'countries.country_id','=','cities.country_id')
        ->get();

        return view('Management.CarDetails.car_detail', compact('car_companies','addresses'));
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
        $newCarDetail = new Car_detail;
        $newCarDetail ->company_id = $request->company_id;
        $newCarDetail ->adress_id = $request->car_address;
        $newCarDetail ->car_name = $request->car_name;
        $newCarDetail ->car_number = $request->car_number;
        $newCarDetail ->price = $request->price;

        if($file = $request->hasFile('photo')) {

            $file = $request->file('photo') ;
            $fileName = $file->getClientOriginalName() ;// للحصول على اسم الصورة
            $request->file('photo')->storeAs('public/images/',$fileName); //لحفظ الصورة في داخل مجلد البابليك

            $newCarDetail->photo = $fileName ; // لحفظ نفس اسم الصورة في الداتابيس

    }


        $newCarDetail->save();

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

        DB::table('car_details')->where('car_id',$id)
        ->update([
            'show_at_page' => 1,
                ]);

        return redirect()->back();
    }


    public function hide($id)
    {

        DB::table('car_details')->where('car_id',$id)
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
        $data = DB::table('car_details')->where('car_id',$id)->get();

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
        DB::table('car_details')->where('car_id',$id)
        ->update(['company_id' => $request->company_id,
                  'adress_id' => $request->car_address,
                  'car_name' => $request->car_name,
                  'car_number' => $request->car_number,
                  'price' => $request->price,
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
        $CarDetail = Car_detail::where('car_id',$id)->delete();

        return redirect()->back();
    }
}
