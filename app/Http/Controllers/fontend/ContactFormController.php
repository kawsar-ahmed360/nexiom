<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FontContact;
use Illuminate\Support\Facades\Session;
class ContactFormController extends Controller
{
    public function ContactStore(Request $request){

    	// return $request->all();

    	$request->validate([
       'name'=>'required',
       'email'=>'required|email',
//       'phone_number'=>'required|min:11|numeric',
       'msg_subject'=>'required',
       'message'=>'required',
    	]);

          $store = new FontContact();
          $store->name = $request->name;
          $store->email = $request->email;
          $store->phone_number = $request->phone_number;
          $store->msg_subject = $request->msg_subject;
          $store->message = $request->message;
          $store->save();
          Session::put('send_mail',$store->email);


          $noti = array(
           'message'=>'Your Message succssfully Received',
           'alert-type'=>'success'
          );

          return redirect()->back()->with($noti);
    }
}
