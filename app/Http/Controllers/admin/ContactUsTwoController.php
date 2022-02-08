<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUsTwo;
class ContactUsTwoController extends Controller
{
     public function ContactTwoIndex(){
        $data['contactTwo'] = ContactUsTwo::where('id','1')->first();
    	return view('backend/Contact_Two/index',$data);
    }


    public function ContactTwoEdite($id){
    
     $data['edite'] = ContactUsTwo::find($id);

     return view('backend/Contact_Two/edite',$data);

    } 

      public function ContactTwoUpdate(Request $request){
    
     $update = ContactUsTwo::find($request->editeId);
     $update->address = $request->address;
     $update->mobile = $request->mobile;
     $update->hours = $request->hours;

     $update->save();

    	return redirect()->route('ContactTwoIndex')->with('successMsg','Contact Two Successfully Update');

    }

    public function ContactTowDelete($id){

    	ContactUsTwo::find($id)->delete();
     
     return redirect()->route('ContactTwoIndex')->with('successMsg','Contact Two Successfully Delete');

    }
}
