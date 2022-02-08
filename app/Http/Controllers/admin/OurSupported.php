<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Supported;
use Illuminate\Http\Request;
use Image;
class OurSupported extends Controller
{
    public function SupportedIndex(){

        $data['supported'] = Supported::get();
        return view('backend.supported.index',$data);
    }

    public function SupportedStore(Request $request){

        $store = new Supported();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fullname = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,60)->save('upload/supported/'.$fullname);
            $store->image = $fullname;
            $store->save();
        }

        $noti = array(
            'message'=>'Supported successfully Inserted',
            'alert-type'=>'success'
        );

        return redirect()->route('SupportedIndex')->with($noti);
    }
    public function SupportedUpdate(Request $request){

         $update = Supported::where('id',$request->edite_id)->first();

         if($request->hasFile('image')){
             $image = $request->file('image');
             $fullname = time().'.'.$image->getClientOriginalExtension();
             @unlink('upload/supported/'.$update->image);
             Image::make($image)->resize(200,60)->save('upload/supported/'.$fullname);
             $update->image = $fullname;
             $update->save();
         }

         $noti = array(
            'message'=>'Supported successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('SupportedIndex')->with($noti);
    }

    public function SupportedDelete($id){

         $dele = Supported::where('id',$id)->first();

         if($dele){

             @unlink('upload/supported/'.$dele->image);
             Supported::where('id',$id)->delete();
         }

         $noti = array(
            'message'=>'Supported successfully Deleted',
            'alert-type'=>'success'
        );

        return redirect()->route('SupportedIndex')->with($noti);
    }
}
