<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsEvent;
use Image;
class NewsEventController extends Controller
{
    public function NewsIndex(){
        $data['news'] = NewsEvent::get();
          return view('backend.news.index',$data);
      }
  
      public function NewsStore(Request $request){
  
          $request->validate([
              // 'image'=>'dimensions:min_width=530,min_height=250'
          ]);
  
          $store = new NewsEvent();
          $store->title = $request->title;
          $slug = str_slug($request->title);
          $bytes = openssl_random_pseudo_bytes(6);
          $rand = bin2hex($bytes);
          $store->summery = $request->summery;
          $store->description = $request->description;
          $store->meta_title = $request->meta_title;
          $store->meta_des = $request->meta_des;
          $store->slug = $slug.'.'.$rand;
          $store->save();
  
           if($request->hasFile('image')){
               
              $image = $request->file('image');
              $fullname = time().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(570,400)->save('upload/news/'.$fullname);
              $store->image = $fullname;
              $store->save();
           }

           $noti = array(
               'message'=>'new successfully Inserted',
               'alert-type'=>'success'
           );
  
           return redirect()->route('NewsIndex')->with($noti);
      }
  
      public function NewsEdite($id){
  
          $data['edite'] = NewsEvent::where('id',$id)->first();
  
          return view('backend.news.edite',$data);
      }
  
  
      public function NewsUpdate(Request $request){
  
          // return $request->editeid;
          $update = NewsEvent::where('id',$request->edite_id)->first();
          $update->title = $request->title;
          $slug = str_slug($request->title);
          $bytes = openssl_random_pseudo_bytes(6);
          $rand = bin2hex($bytes);
          $update->summery = $request->summery;
          $update->slug = $slug.'.'.$rand;
          $update->description = $request->description;
          $update->meta_title = $request->meta_title;
          $update->meta_des = $request->meta_des;
          $update->save();
           
          
          if($request->hasFile('image')){
               
              $image = $request->file('image');
              $fullname = time().'.'.$image->getClientOriginalExtension();
              @unlink('upload/news/'.$update->image);
              Image::make($image)->resize(570,400)->save('upload/news/'.$fullname);
              $update->image = $fullname;
              $update->save();
           }
  
           $noti = array(
            'message'=>'new successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('NewsIndex')->with($noti);
          
      }
  
      public function NewsDelete($id){
  
          $del = NewsEvent::where('id',$id)->first();
          
          if($del){
             
              @unlink('upload/news/'.$del->image);
              NewsEvent::where('id',$id)->delete();
          }
  
          $noti = array(
            'message'=>'new successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->route('NewsIndex')->with($noti);
      }
  
      public function NewsSingleView($id){
  
          $data['single_new'] = NewsEvent::where('id',$id)->first();
  
          return view('backend.news.single_view',$data);
      }
}
