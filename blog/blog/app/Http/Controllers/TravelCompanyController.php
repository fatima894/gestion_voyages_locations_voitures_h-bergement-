<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel_company;
use Illuminate\Support\Facades\DB;
use DataTables;

class TravelCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $alltravel_companies = Travel_company::all();

        return Datatables::of($alltravel_companies)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->company_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editTravelCompany">Modifier</a>';

                    $btn = $btn.' <a href="/travel_company/delete/'.$row->company_id.'" data-toggle="tooltip"  data-id="'.$row->company_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTravelCompany">Supprimer</a>';



                          return $btn;

                     })

                  ->rawColumns(['action'])
                       ->make(true);

        }
        return view('Management.travels.travel_company');
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

            $newTravelCompany = new Travel_company;
            $newTravelCompany->company_name = $request->name;
            $newTravelCompany->photo = $fileName ; // لحفظ نفس اسم الصورة في الداتابيس
            $newTravelCompany->save();
            return redirect()->back();
        }else{
            $newTravelCompany = new Travel_company;
            $newTravelCompany->company_name = $request->name;
            $newTravelCompany->save();
            return redirect()->back();
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
        $data = DB::table('travel_companies')->where('company_id',$id)->get();

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
        DB::table('travel_companies')->where('company_id',$id)
        ->update(['company_name' => $request->name ,

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
        $travel_company = Travel_company::where('company_id',$id)->delete();

        return redirect()->back();
    }
}
