<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\ProductDetailsAddMore;
use App\ProGallery;
use Illuminate\Http\Request;
use App\ProductCategory;
use App\Products;
use Image;
use DB;

class ProductController extends Controller
{
     
   //.....................Category Secton....................

	public function ProductCategoryIndex(){
      
      $categoryView = ProductCategory::get();

      return view('backend/product/product_category_index',compact('categoryView')); 
 
	}

    public function ProductCategoryCreate(){

    	return view('backend/product/product_category_create');
    }

    public function ProductCategoryStore(Request $request){

        $request->validate([
        'category_name'=>'required',
        // 'category_image'=>'required'
        ]);
     // return $request->all();

    	$category = new ProductCategory();
    	$category->category_name = $request->category_name;
    	$category->brand_name = $request->brand_name;
    	$slug =str_slug($request->category_name);
        $category->slug = $slug;
    	if ($request->hasFile('category_image')) {
    		$image = $request->file('category_image');
    		$fullName = time().'.'.$image->getClientOriginalExtension();
    		Image::make($image)->resize(370,300)->save('upload/category_image/'.$fullName);
    		$category->category_image = $fullName;
    		$category->save();
    	}


        if ($request->hasFile('brand_image')) {
            $imagebrand = $request->file('brand_image');
            $fullNameBrand = time().'.'.$imagebrand->getClientOriginalExtension();
            Image::make($imagebrand)->resize(424,421)->save('upload/Brand/'.$fullNameBrand);
            $category->brand_image = $fullNameBrand;
            $category->save();
        }
    	$category->save();

    	return redirect()->route('ProductCategoryIndex')->with('successMsg','Product Category Successfully Saved');
    }

    public function ProductCategoryEdite($id){

    	$edite = ProductCategory::find($id);

    	return view('backend/product/product_category_edite',compact('edite'));
    }

    public function ProductCategoryUpdate(Request $request,$id){

    	$request->validate([
    		'category_name'=>'required'
    	]);

    	$update = ProductCategory::find($id);
    	$update->category_name = $request->category_name;
    	$update->brand_name = $request->brand_name;
    	if ($request->hasFile('category_image')) {
    		$image = $request->file('category_image');
    		$fullName = time().'.'.$image->getClientOriginalExtension();
    		@unlink('upload/category_image/'.$update->category_image);
    		Image::make($image)->resize(370,300)->save('upload/category_image/'.$fullName);
    		$update->category_image = $fullName;
    		$update->save();
    	}

        if ($request->hasFile('brand_image')) {
            $imagebrand = $request->file('brand_image');
            $fullNameBrand = time().'.'.$imagebrand->getClientOriginalExtension();
            @unlink('upload/Brand/'.$update->category_image);
            Image::make($imagebrand)->resize(424,421)->save('upload/Brand/'.$fullNameBrand);
            $update->brand_image = $fullNameBrand;
            $update->save();
        }

    	$update->save();

    	return redirect()->route('ProductCategoryIndex')->with('successMsg','Product Category Successfully Update');
    }

    public function ProductCategoryDelete($id){

    	$pro_cat = ProductCategory::where('id',$id)->first();

    	if ($pro_cat) {
    		@unlink('upload/category_image/'.$pro_cat->category_image);
    		@unlink('upload/Brand/'.$pro_cat->brand_image);
    	}

    	ProductCategory::where('id',$id)->delete();

    	return redirect()->route('ProductCategoryIndex')->with('successMsg','Product Category Successfully Delete');


    }



    //....................End Category Section.........................





    //........................ Products  Section...........................

    public function ProductCreate(){
        $data['category'] = ProductCategory::get();
    	return view('backend/product/product_create',$data);
    }

    public function ProductStore(Request $request){


    	$request->validate([
         'cat_id'=>'required',
         'product_name'=>'required',
         'product_image'=>'required',
    	]);

        $bytes = openssl_random_pseudo_bytes(6);
        $rand = bin2hex($bytes);

    	$product = new Products();
    	$product->cat_id = $request->cat_id;
    	$product->product_name = $request->product_name;
		$product->des = $request->des;
        $slug = str_slug($request->product_name);
        $product->slug = $slug.$rand;
        $product->meta_title = $request->meta_title;
        $product->meta_des = $request->meta_des;
        $product->model = $request->model;
        $product->bar = $request->bar;

    	if ($request->hasFile('product_image')) {
    		$image = $request->file('product_image');
    		$fullName = time().'.'.$image->getClientOriginalExtension();
    		// @unlink('upload/product_image/'.$update->category_image);
    		Image::make($image)->resize(560,380)->save('upload/product_image/'.$fullName);
    		$product->product_image = $fullName;
    		$product->save();
    	}


    	if($request->hasFile('gallery')){
    	    $gall = $request->file('gallery');

            foreach (@$gall as $key=>$ga) {
                $fullgalleryname = time().$key.'.'.uniqid().'.'.$ga->getClientOriginalExtension();
                Image::make($ga)->resize(1000,1000)->save('upload/pro_gallery/'.$fullgalleryname);
                $gall_store = new ProGallery();
                $gall_store->pro_id = $product->id;
                $gall_store->gallery =$fullgalleryname;
                $gall_store->save();
    	    }
        }

    	$product->save();

	   

         return redirect()->route('ProductCatWiseIndex')->with('successMsg','Product Successfully Inserted');
    }

    public function ProductCatWiseIndex(){

        $product = Products::with('Category')->select('cat_id',DB::raw('count(cat_id) as totalcount'))
            ->groupBy('cat_id')
            ->get();



        return view('backend/product/cat_wise_pro',compact('product'));
    }

    public function ProductIndex($cat_id){

    	$product = Products::with('Category')->wherehas('Category',function ($query){
        })->where('cat_id',$cat_id)->get();

    	$category = ProductCategory::where('id',$cat_id)->first();

    	return view('backend/product/product_index',compact('product','category'));
    }

    public function ProductEdite($id){

    	$edite = Products::where('id',$id)->first();
        $category = ProductCategory::get();
        $pro_gallery = ProGallery::where('pro_id',$id)->get();


    	return view('backend/product/product_edite',compact('edite','category','pro_gallery'));

    	// dd($edite->toArray());
    }

    public function ProductUpdate(Request $request,$id){

    	$request->validate([
         'product_name'=>'required',
         // 'gallery_image'=>'required',
    	]);

        $bytes = openssl_random_pseudo_bytes(6);
        $rand = bin2hex($bytes);

    	$update = Products::where('id',$id)->first();
         $update->product_name = $request->product_name;
         $update->cat_id = $request->cat_id;
		 $update->des = $request->des;
		 $update->slug = $request->slug.$rand;
        $update->meta_title = $request->meta_title;
        $update->meta_des = $request->meta_des;
        $update->model = $request->model;
        $update->bar = $request->bar;

         if ($request->hasFile('product_image')) {
    		$image = $request->file('product_image');
    		$fullName = time().'.'.$image->getClientOriginalExtension();
    		@unlink('upload/product_image/'.$update->product_image);
    		Image::make($image)->resize(560,380)->save('upload/product_image/'.$fullName);
    		$update->product_image = $fullName;
    		$update->save();
    	}

    	if($request->hasFile('gallery')){

             $dele = ProGallery::where('pro_id',$id)->get();
             foreach (@$dele as $key=>$galls){
                 @unlink('upload/pro_gallery/'.@$galls->gallery);
                 $galls->delete();
             }

            $gall = $request->file('gallery');

            foreach (@$gall as $key=>$ga) {
                $fullgalleryname = time().$key.'.'.uniqid().'.'.$ga->getClientOriginalExtension();
                Image::make($ga)->resize(1000,1000)->save('upload/pro_gallery/'.$fullgalleryname);
                $gall_store = new ProGallery();
                $gall_store->pro_id = $id;
                $gall_store->gallery =$fullgalleryname;
                $gall_store->save();
            }

        }

    	$update->save();
       

    	return redirect()->route('ProductCatWiseIndex')->with('successMsg','Product Successfully Update');


    }

    public function ProductDelete($id){
    
      $update = Products::where('id',$id)->first(); 

    	if ($update) {
         
            @unlink('upload/product_image/'.$update->product_image);
            Products::where('id',$id)->delete();

        }

        $allgall = ProGallery::where('pro_id',$id)->get();

        foreach (@$allgall as $key=>$galls){
            @unlink('upload/pro_gallery/'.@$galls->gallery);
            $galls->delete();
        }



    		return redirect()->route('ProductCatWiseIndex')->with('successMsg','Product Successfully Update');

    }

    public function ProductActive($id){

        $active = Products::where('id',$id)->first();
        $active->status =2;
        $active->save();


        $Noti = array(
            'message'=>'successfully Highlight',
            'alert-type'=>'success'

        );

        return redirect()->back()->with($Noti);
    }

    public function ProductDeactive($id){

        $active = Products::where('id',$id)->first();
        $active->status =1;
        $active->save();


        $Noti = array(
            'message'=>'successfully Highlight',
            'alert-type'=>'success'

        );

        return redirect()->back()->with($Noti);
    }

    public function ProductDetailsAddMore($pro_id){

        $data['pro_id'] = $pro_id;

        $data['all_des'] = ProductDetailsAddMore::where('pro_id',$pro_id)->get();

        return view('backend.product.AddMore',$data);
    }

    public function ProductDetailsAddMorePost(Request $request){

        if($request->title==null){
            $noti = array(
                'message'=>'title field null',
                'alert-type'=>'error'

            );

            return redirect()->back()->with($noti);
        }



        if($request->title==[null]){
            $noti = array(
                'message'=>'title field null',
                'alert-type'=>'error'

            );

            return redirect()->back()->with($noti);
        }



        if($request->alreadyExhis=='exists'){


            $exi = ProductDetailsAddMore::where('pro_id',$request->ProdId)->get();

            foreach (@$exi as $key=>$exhid){
                $exhid->delete();
            }

            foreach (@$request->title as $key=>$title){
                $store =new ProductDetailsAddMore();
                $store->pro_id = $request->ProdId;
                $store->title = $title;
                $store->summary = $request->summary[$key];
                $store->save();
            }

        }else{


            foreach (@$request->title as $key=>$title){
                $store =new ProductDetailsAddMore();
                $store->pro_id = $request->ProdId;
                $store->title = $title;
                $store->summary = $request->summary[$key];
                $store->save();
            }
        }


        $noti = array(
            'message'=>'successfully Store',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);


    }

}
