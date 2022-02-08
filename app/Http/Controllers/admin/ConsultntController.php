<?php

namespace App\Http\Controllers\admin;

use App\Consultnt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ConsultntController extends Controller
{
    public function ConsultntIndex(){
       $data['consul'] = Consultnt::get();
        return view('backend.Consultnt.index',$data);
    }

    public function ConsultntStore(Request $request){
      
         $store = new  Consultnt();
         $store->name = $request->name;
         $store->short_title = $request->short_title;
         $store->slug = str_slug($request->name);
         

         if($request->hasFile('image')){
             $image = $request->file('image');
             $fullname = time().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(380,300)->save('upload/consultnt/'.$fullname);
             $store->image = $fullname;
             $store->save();
         }

         $store->save();

         $noti = array(

            'message'=>'Consultnt Successfully Inserted',
            'alert-type'=>'success'
         );

         return redirect()->route('ConsultntIndex')->with($noti);
         
    }

    public function ConsultntUpdate(Request $request){

         $update = Consultnt::where('id',$request->edite_id)->first();
         $update->name = $request->name;
         $update->short_title = $request->short_title;
         
          if($request->hasFile('image')){

              $image = $request->file('image');
              $fullname =  time().'.'.$image->getClientOriginalExtension();
              @unlink('backend/consultnt/'.$update->image);
              Image::make($image)->resize(380,300)->save('upload/consultnt/'.$fullname);
              $update->image = $fullname;
              $update->save();
          }
            
          $noti = array(
              'message'=>'Consultnt Successfully Updated',
              'alert-type'=>'success'
          );
          return redirect()->route('ConsultntIndex')->with($noti);
    }

    public function ConsultntDelete($id){

        $update = Consultnt::where('id',$id)->first();
        
        if($update){

             @unlink('upload/consultnt/'.$update->image);
             Consultnt::where('id',$id)->delete();
        }

        $noti = array(
            'message'=>'Consultnt Successfully Deleted',
            'alert-type'=>'success'
        );
        return redirect()->route('ConsultntIndex')->with($noti);
    }
}
