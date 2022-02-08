<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logo;
use Image;
class LogoController extends Controller
{
    public function LogoIndex(){
       $logo=Logo::find('1');
    	return view('backend/logo/index',compact('logo'));
    }

    public function LogoEdite($id){
       $edite = Logo::find($id);
    	return view('backend/logo/edite',compact('edite'));
    }

    public function LogoUpdate(Request $request,$id){
  
      $update = Logo::find($id);
      $update->description = $request->description;
      
      if ($request->hasFile('logo')) {
      	$image = $request->file('logo');
      	$fullName = time().'.'.$image->getClientOriginalExtension();
      	@unlink('upload/logo/'.$update->logo);
      	Image::make($image)->resize(80,90)->save('upload/logo/'.$fullName);
      	$update->logo = $fullName;
      	$update->save();
      }

      $update->save();

      $noti = array(
         'message'=>'Logo Successfully Updated',
         'alert-type'=>'success'
      );

      return redirect()->route('LogoIndex')->with($noti);

    }


}
