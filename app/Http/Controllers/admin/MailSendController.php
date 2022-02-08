<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FontContact;
use Mail;
use Session;
class MailSendController extends Controller
{
    public function MailIndex(){

    	$data['mail'] = FontContact::OrderBy('id','desc')->get();
    	$data['mail_ed'] = FontContact::OrderBy('id','desc')->get();

    	return view('backend/mail/index',$data);
    }

    public function MailSend(){

    	return view('backend/mail/compose');
    }

    public function MailSubmit(Request $request){
    
     $data = array(
      'email'=>$request->email,
      'subject'=>$request->subject,
      'description'=>$request->description,
     );


       Mail::send('backend/mail/mail_template', $data, function($message) use ($data) {
            $message -> from('kawsar@gmail.com', 'admin');
            $message -> to($data['email']);
            $message -> subject($data['subject']);
        });

       Session::forget('send_mail');


       return redirect()->back();

    }

    public function MailDelete($id){

     FontContact::find($id)->delete();

      return redirect()->route('MailIndex')->with('successMsg','Message Successfully Delete');
    }
}
