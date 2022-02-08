<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
class ContactUsController extends Controller
{
    public function ContactIndex(){
        $data['contact'] = ContactUs::where('id','1')->first();
    	return view('backend/ContactUs/index',$data);
    }



    public function ContactEdite($id){
    
     $data['edite'] = ContactUs::find($id);

     return view('backend/ContactUs/edite',$data);

    } 

      public function ContactUpdate(Request $request){
    
     $update = ContactUs::find($request->editeId);
     $update->mobile_one = $request->mobile_one;
     $update->mobile_two = $request->mobile_two;
     $update->email_one = $request->email_one;
     $update->email_two = $request->email_two;
     $update->web_one = $request->web_one;
     $update->web_two = $request->web_two;
     $update->office_address = $request->office_address;
     $update->contact_title = $request->contact_title;
     $update->contact_summary = $request->contact_summary;
     $update->save();

    	return redirect()->route('ContactIndex')->with('successMsg','Contact Us Successfully Update');

    }

    public function ContactDelete($id){

    	ContactUs::find($id)->delete();
     
     return redirect()->route('ContactIndex')->with('successMsg','Contact Successfully Delete');

    }
}
