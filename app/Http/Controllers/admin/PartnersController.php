<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\PartnerManage;
use Illuminate\Http\Request;
use Image;

class PartnersController extends Controller
{
    public function ParnersIndex(){
        
           $data['index'] = PartnerManage::get();
      
        
        return view('backend/Part/all_part',$data);
    }

    public function ParnersStore(Request $request){

        $store = new PartnerManage();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully Created',
            'alert-type'=>'success'
        );
        return redirect()->route('ParnersIndex')->with($noti);
    }

    public function ParnersUpdate(Request $request){

        $store = PartnerManage::where('id',$request->EditeId)->first();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully Updated',
            'alert-type'=>'success'
        );
        return redirect()->route('ParnersIndex')->with($noti);
    }


    private function save(PartnerManage $store,Request $request){

        $store->url = $request->url;
        $store->title = $request->title;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fullname = time().'.'.$image->getClientOriginalExtension();
            @unlink('upload/Partners/'.@$store->image);
            Image::make($image)->resize(250,120)->save('upload/Partners/'.@$fullname);
            $store->image = $fullname;
            $store->save();
        }
        $store->save();
    }

    public function ParnersDelete($id){

        $del = PartnerManage::where('id',$id)->first();
        if($del){
            @unlink('upload/Partners/'.@$del->image);
            PartnerManage::where('id',$id)->delete();
        }


        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );
        return redirect()->route('ParnersIndex')->with($noti);
    }
}
