<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car_company;
use Illuminate\Support\Facades\DB;
use DataTables;

class CarsCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $allcar_companies = car_company::all();
        return Datatables::of($allcar_companies)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->car_company_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCarCompany">Modifer</a>';

                    $btn = $btn.' <a href="/car_company/delete/'.$row->car_company_id.'" data-toggle="tooltip"  data-id="'.$row->car_company_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCarCompany">Supprimer</a>';



                          return $btn;

                     })

                  ->rawColumns(['action'])
                       ->make(true);

        }
        return view('Management.cars.car_company');
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
        $newCarCompany = new car_company;
        $newCarCompany->car_company_name = $request->name;
        $newCarCompany->save();

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
        $data = DB::table('car_companies')->where('car_company_id',$id)->get();

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
        DB::table('car_companies')->where('car_company_id',$id)
        ->update(['car_company_name' => $request->name ,

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
        $car_company = car_company::where('car_company_id',$id)->delete();

        return redirect()->back();
    }
}
