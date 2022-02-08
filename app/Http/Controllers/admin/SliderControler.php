<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Image;
class SliderControler extends Controller
{


    public function SliderIndex(){
       $data['slider'] = Slider::get();
    	return view('backend/slider/index',$data);
    }

    public function SliderCreate(){

    	return view('backend/slider/SliderCreate');
    }

    public function SliderStore(Request $request){


    	 $request->validate([
        //   'title'=>'required',
          // 'sort_description'=>'required',
          'image'=>'required',
    	 ]);

    	$store = new Slider();
    	$store->title = $request->title; 
    	$store->sub_title = $request->sub_title; 
    	$store->sort_description = $request->sort_description;

    	 if ($request->image) {
    	 	
    	   $image = $request->file('image');
    	   $fullName = time().'.'.$image->getClientOriginalExtension();

    	   Image::make($image)->resize(1349,710)->save('upload/slider/'.$fullName);
    	   $store->image = $fullName;
    	   $store->save();

    	 }

    	 $store->save();
		 $noti = array(
			 'message'=>'Slider Successfully Created',
			 'alert-type'=>'success'
		 );

    	return redirect()->route('SliderIndex')->with($noti);


    }

    public function SliderEdite($id){
    
     $data['edite'] = Slider::find($id);

     return view('backend/slider/edite',$data);

    } 

      public function SliderUpdate(Request $request){
    
     $update = Slider::find($request->editeId);
     $update->title = $request->title;
     $update->sub_title = $request->sub_title; 
     $update->sort_description = $request->sort_description;
      if ($request->image) {
    	 	
    	   $image = $request->file('image');
    	   $fullName = time().'.'.$image->getClientOriginalExtension();
    	   @unlink('upload/slider/'.$update->image);

    	   Image::make($image)->resize(1349,710)->save('upload/slider/'.$fullName);
    	   $update->image = $fullName;
    	   $update->save();

    	 }
        $update->save();

		$noti = array(
			'message'=>'Slider Successfully Updated',
			'alert-type'=>'success'
		);

	   return redirect()->route('SliderIndex')->with($noti);


    }

    public function SliderDelete($id){

		$del = Slider::where('id',$id)->first();

		if($del){
          
			@unlink('upload/slider/'.$del->image);
			Slider::find($id)->delete();
		}

    	$noti = array(
			'message'=>'Slider Successfully Deleted',
			'alert-type'=>'success'
		);
     
     return redirect()->route('SliderIndex')->with($noti);

    }


}
