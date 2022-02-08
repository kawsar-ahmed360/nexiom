<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SimpleSlider;
use Image;
class SimpleSliderContorller extends Controller
{
    public function simpleSliderIndex(){
       $data['slider'] = SimpleSlider::get();
    	return view('backend/simple_slider/index',$data);
    }

    public function simpleSliderCreate(){

    	return view('backend/simple_slider/create');
    }

    public function simpleSliderStore(Request $request){

      // return $request->all();


    	 $request->validate([
       
          'simple_slider_image' => 'required|dimensions:min_width=670,min_height=400'
    	 ]);

    	$store = new SimpleSlider();
   	 
    	 if ($request->simple_slider_image) {
    	 	
    	   $image = $request->file('simple_slider_image');
    	   $fullName = time().'.'.$image->getClientOriginalExtension();

    	   Image::make($image)->resize(670,400)->save('upload/simpleSlider/'.$fullName);
    	   $store->simple_slider_image = $fullName;
    	   $store->save();

    	 }

    	 $store->save();

    	return redirect()->route('simpleSliderIndex')->with('successMsg','Slider Successfully Saved');


    }

    public function simpleSliderEdite($id){
    
     $data['edite'] = SimpleSlider::find($id);

     return view('backend/simple_slider/edite',$data);

    } 

      public function simpleSliderUpdate(Request $request){

      	$request->validate([
        'simple_slider_image'=>'dimensions:min_width=670,min_height=400',
      	]);
    
     $update = SimpleSlider::find($request->editeId); 
      if ($request->simple_slider_image) {
    	 	
    	   $image = $request->file('simple_slider_image');
    	   $fullName = time().'.'.$image->getClientOriginalExtension();
    	   @unlink('upload/simpleSlider/'.$update->image);

    	   Image::make($image)->resize(670,400)->save('upload/simpleSlider/'.$fullName);
    	   $update->simple_slider_image = $fullName;
    	   $update->save();

    	 }
        $update->save();

    	return redirect()->route('simpleSliderIndex')->with('successMsg','Slider Successfully Update');

    }

    public function simpleSliderDelete($id){

    	SimpleSlider::find($id)->delete();
     
     return redirect()->route('simpleSliderIndex')->with('successMsg','Slider Successfully Delete');

    }

}
