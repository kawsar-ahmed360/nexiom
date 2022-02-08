<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SocialIcon;
class SocialIconController extends Controller
{
    
    public function SocialIndex(){
       $data['social'] = SocialIcon::get();
    	return view('backend/social/index',$data);
    }

    public function SocialCreate(){

    	return view('backend/social/create');
    }

    public function SocialStore(Request $request){


    	 $request->validate([
          'icon'=>'required',
          'url'=>'required',
         
    	 ]);

    	$store = new SocialIcon();
    	$store->icon = $request->icon;
    	$store->url = $request->url;
    	$store->save();
        $noti = array(
            'message'=>'Social Icon Successfully Created',
            'alert-type'=>'success'
        );

    	return redirect()->route('SocialIndex')->with($noti);


    }

    public function SocialEdite($id){
    
     $data['edite'] = SocialIcon::find($id);

     return view('backend/social/edite',$data);

    } 

      public function SocialUpdate(Request $request){
    
     	$store = SocialIcon::find($request->EditeId);
    	$store->icon = $request->icon;
    	$store->url = $request->url;

   
        $store->save();

        $noti = array(
            'message'=>'Social Icon Successfully Updated',
            'alert-type'=>'success'
        );

    	return redirect()->route('SocialIndex')->with($noti);

    }

    public function SocialDelete($id){

    	SocialIcon::find($id)->delete();
     
        $noti = array(
            'message'=>'Social Icon Successfully Delete',
            'alert-type'=>'success'
        );

    	return redirect()->route('SocialIndex')->with($noti);

    }
}
