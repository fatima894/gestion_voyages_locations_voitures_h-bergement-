<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class ApprovalPaymentController extends Controller
{
    
    public function approval($record_id ,$type){
     
        
        
        if($type == "car"){

        $data = DB::table('car_reservations')
        ->where('car_reservation_id', $record_id)
        ->update(['status' => 'paid']);

        }elseif($type == "flight"){

            $data = DB::table('flight_reservations')
            ->where('flight_reservation_id', $record_id)
            ->update(['status' => 'paid']);

        }elseif($type == "house"){

            $data = DB::table('house_reservations')
            ->where('house_reservation_id', $record_id)
            ->update(['status' => 'paid']);
            
        }


        return redirect()->route('homePage');



    }
}
