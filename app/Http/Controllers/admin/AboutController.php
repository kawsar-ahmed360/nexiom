<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Image;
class AboutController extends Controller
{
    
 public function AboutIndex(){
        $data['about'] = About::where('id','1')->first();
    	return view('backend/about/index',$data);
    }


    public function AboutEdite($id){
    
     $data['edite'] = About::find($id);

     return view('backend/about/edite',$data);

    } 

      public function AboutUpdate(Request $request){
    
     $update = About::find($request->editeId);
     $update->title = $request->title;
     $update->short = $request->short;
     $update->description = $request->description;
     $update->meta_title = $request->meta_title;
     $update->meta_des = $request->meta_des;

     if($request->hasFile('image')){

       $image = $request->image;
       $Fullname = time().'.'.$image->getClientOriginalExtension();
       @unlink('upload/about/'.$update->image);
       Image::make($image)->resize(720,450)->save('upload/about/'.$Fullname);
       $update->image = $Fullname;
       $update->save();

     }

     $update->save();

     $noti = array(
       'message'=>'About Successfully Updated',
       'alert-type'=>'success'
     );

    	return redirect()->route('AboutIndex')->with($noti);

    }
}
