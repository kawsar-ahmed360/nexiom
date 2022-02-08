<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GalleryCategory;
use App\Gallery;
use Image;
class GalleryController extends Controller
{
   
   //.....................Category Secton....................

	public function CategoryIndex(){
      
      $categoryView = GalleryCategory::get();

      return view('backend/gallery/category_index',compact('categoryView')); 
 
	}

    public function CategoryCreate(){

    	return view('backend/gallery/create_category');
    }

    public function CategoryStore(Request $request){

        $request->validate([
        'category_name'=>'required'
        ]);
     // return $request->all();

    	$category = new GalleryCategory();
    	$category->category_name = $request->category_name;
    	$category->save();

    	return redirect()->route('CategoryIndex')->with('successMsg','Slider Successfully Saved');
    }

    public function CategoryEdite($id){

    	$edite = GalleryCategory::find($id);

    	return view('backend/gallery/category_edite',compact('edite'));
    }

    public function CategoryUpdate(Request $request,$id){

    	$request->validate([
    		'category_name'=>'required'
    	]);

    	$update = GalleryCategory::find($id);
    	$update->category_name = $request->category_name;
    	$update->save();

    	return redirect()->route('CategoryIndex')->with('successMsg','Slider Successfully Update');
    }

    public function CategoryDelete($id){

    	GalleryCategory::find($id)->delete();
    	return redirect()->route('CategoryIndex')->with('successMsg','Slider Successfully Delete');


    }



    //....................End Category Section.........................

    //........................Gallery Section...........................

    public function GalleryCreate(){
        // $data['gallery'] = Gallery::get();
    	return view('backend/gallery/gallery_create');
    }

    public function GalleryStore(Request $request){

	      $store = new Gallery();

		  if($request->hasFile('gallery_image')){
			  $image = $request->file('gallery_image');
			  $fullname = time().'.'.$image->getClientOriginalExtension();
			  Image::make($image)->resize(280,270)->save('upload/gallery/'.$fullname);
			  $store->gallery_image = $fullname;
			  $store->save();
		  }

		$noti = array(
			'message'=>'News Successfully Inserted',
			'alert-type'=>'success'
		);

    	return redirect()->route('GalleryIndex')->with($noti);
    }

    public function GalleryIndex(){

    	$gallery = Gallery::get();

    	return view('backend/gallery/gallery_index',compact('gallery'));
    }

    public function GalleryEdite($id){

    	$edite = Gallery::where('id',$id)->first();
        // $category = GalleryCategory::get();

    	return view('backend/gallery/gallery_edite',compact('edite','category'));

    	// dd($edite->toArray());
    }

    public function GalleryUpdate(Request $request,$id){

    	$request->validate([
        //  'cat_id'=>'required',
         'gallery_image'=>'required',
    	]);

		$update = Gallery::where('id',$id)->first();

		if($request->hasFile('gallery_image')){
			$image = $request->file('gallery_image');
			$fullname = time().'.'.$image->getClientOriginalExtension();
			@unlink('upload/gallery/'.$update->gallery_image);
			Image::make($image)->resize(280,270)->save('upload/gallery/'.$fullname);
			$update->gallery_image = $fullname;
			$update->save();
		}

    

		$noti = array(
			'message'=>'News Successfully Update',
			'alert-type'=>'success'
		);

    	return redirect()->route('GalleryIndex')->with($noti);


    }

    public function GalleryDelete($id){
    
      $update = Gallery::where('cat_id',$id)->get(); 

    	if ($update) {
         
          foreach ($update as $key => $GalleryImage) {
              @unlink('upload/gallery/'.$GalleryImage->gallery_image);
              $GalleryImage->delete();
           }    		
    		
    	}

    		return redirect()->route('GalleryIndex')->with('successMsg','Slider Successfully Update');

    }

  
}
