<?php

namespace App\Http\Controllers\admin;

use App\AllPatient;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllPatientController extends Controller
{
    public function AllPatientCreate(){

        return view('backend.all_patient.create');
    }
    public function AllPatientIndex(){

        $data['patient'] = AllPatient::get();

        return view('backend.all_patient.index',$data);
    }

    public function AllPatientStore(Request $request){

         $request->validate([

         ]);

         $store = new AllPatient();

         $store->title = $request->title;
         $store->short_title = $request->short_title;
         $store->description = $request->description;
         $store->slug = str_slug($request->title);
         $store->save();
         
         if($request->hasFile('image')){
             $image = $request->file('image');
             $fullname = time().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(360,250)->save('upload/all_patient/'.$fullname);
             $store->image = $fullname;
             $store->save();
         }

         $noti = array(
             'message'=>'Patient Data Successfully Inserted',
             'alert-type'=>'success'
         );

         return redirect()->route('AllPatientIndex')->with($noti);
    }

    public function AllPatientEdite($id){

        $data['edite'] = AllPatient::where('id',$id)->first();
        return view('backend.all_patient.edite',$data);
    }

    public function AllPatientUpdate(Request $request){

         $update = AllPatient::where('id',$request->edite_id)->first();
         $update->title = $request->title;
         $update->short_title = $request->short_title;
         $update->description = $request->description;

         $update->save();

         if($request->hasFile('image')){

             $image = $request->file('image');
             $fullname = time().'.'.$image->getClientOriginalExtension();
             @unlink('upload/all_patient/'.$update->image);
             Image::make($image)->resize(360,250)->save('upload/all_patient/'.$fullname);
             $update->image = $fullname;
             $update->save();
         }

         $noti = array(
            'message'=>'Patient Data Successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('AllPatientIndex')->with($noti);
    }

    public function AllPatientDelete($id){

        $dele = AllPatient::where('id',$id)->first();

        if($dele){

             @unlink('upload/all_patient/'.$dele->image);
             AllPatient::where('id',$id)->delete(); 
        }

        $noti = array(
            'message'=>'Patient Data Successfully Deleted',
            'alert-type'=>'success'
        );

        return redirect()->route('AllPatientIndex')->with($noti);
    }
}
