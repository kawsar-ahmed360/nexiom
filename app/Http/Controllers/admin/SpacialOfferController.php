<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\SpecialOffer;
use Illuminate\Http\Request;
use Image;


class SpacialOfferController extends Controller
{
      
        public function SpecialOfferIndex(){
            $data['about'] =SpecialOffer::where('id','1')->first();
            return view('backend/Speical_offer/index',$data);
        }


        public function SpecialOfferEdite($id){

        $data['edite'] = SpecialOffer::find($id);

        return view('backend/Speical_offer/edite',$data);

        } 

        public function SpecialOfferUpdate(Request $request){

            // return $request->all();

        $update = SpecialOffer::find($request->editeId);
        $update->title = $request->title;
        $update->short_title = $request->short_title;
        $update->description = $request->description;

        if($request->hasFile('image')){

        $image = $request->image;
        $Fullname = time().'.'.$image->getClientOriginalExtension();
        @unlink('upload/Spacial_offer/'.$update->image);
        Image::make($image)->resize(800,1000)->save('upload/Spacial_offer/'.$Fullname);
        $update->image = $Fullname;
        $update->save();

        }

        $update->save();

        $noti = array(
        'message'=>'SpecialOffer Successfully Updated',
        'alert-type'=>'success'
        );

            return redirect()->route('SpecialOfferIndex')->with($noti);

        }
}
