<?php

namespace App\Http\Controllers\admin;

use App\ClientManage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ClientManageController extends Controller
{
    public function ClientIndex(){

        $data['index'] = ClientManage::get();
        return view('backend.Client.all_index',$data);
    }

    public function ClientStore(Request $request){

        $store = new ClientManage();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully Created',
            'alert-type'=>'success'
        );

        return redirect()->route('ClientIndex')->with($noti);
    }

    public function ClientUpdate(Request $request){

        $store = ClientManage::where('id',$request->EditeId)->first();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('ClientIndex')->with($noti);

    }

    private function save(ClientManage $store,Request $request){

        $store->url = $request->url;
        $store->title = $request->title;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fullname = time().'.'.$image->getClientOriginalExtension();
            @unlink('upload/Client/'.@$store->image);
            Image::make($image)->resize(250,120)->save('upload/Client/'.@$fullname);
            $store->image = $fullname;
            $store->save();
        }
        $store->save();
    }

    public function ClientDelete($id){

        $del = ClientManage::where('id',$id)->first();
        if($del){

            @unlink('upload/Client/'.@$del->image);
            ClientManage::where('id',$id)->delete();
        }

        $noti = array(
            'message'=>'successfully Deleted',
            'alert-type'=>'success'
        );

        return redirect()->route('ClientIndex')->with($noti);
    }
}
