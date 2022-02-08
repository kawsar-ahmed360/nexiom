<?php

namespace App\Http\Controllers\admin;

use App\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CounterContrller extends Controller
{
    public function CounterIndex(){
       $data['counter'] = Counter::get();
        return view('backend.counter.index',$data);
    }

    public function CounterUpdate(Request $request){

         $update = Counter::where('id',$request->edite_id)->first();
         $update->total_donation = $request->total_donation;
         $update->total_donation_count = $request->total_donation_count;

         $update->total_project = $request->total_project;
         $update->total_project_count = $request->total_project_count;

         $update->total_volunteers = $request->total_volunteers;
         $update->total_volunteers_count = $request->total_volunteers_count;

         $update->total_Projects_two = $request->total_Projects_two;
         $update->total_Projects_two_count = $request->total_Projects_two_count;
         $update->save();

         $noti = array(
             'message'=>'data successfully Updated',
             'alert-type'=>'success'
         );



         return redirect()->route('CounterIndex')->with($noti);
    }
}
