<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Page;
use App\Slider;
use App\SocialIcon;
use App\ContactUsTwo;
use App\ContactUs;
use App\service;
use App\Logo;
use Image;
class PageController extends Controller
{


   public function PageIndex()
    {
        $page =   Page::all();
        return view('backend.page.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PageCreate()
    {
        $menu_all   =   Menu::all();
        return view('backend.page.create',compact('menu_all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function PageStore(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'title_uri' => 'required',

        ]);
      
        $slug = $request->title_uri;

        
        $store = new Page();
        $store->title = $request->title;
        $store->title_uri = $slug;
        $store->short = $request->short;
        $store->description = $request->description;
        $store->meta_title = $request->meta_title;
        $store->meta_des = $request->meta_des;

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $fullName = time().'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(500,500)->save('upload/page/'.$fullName);
         $store->image = $fullName;
         $store->save();
      }else {
          $fullName = 'default.png';
        }

        $store->save();
        return redirect()->route('PageIndex')->with('successMsg','Page Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PageEdite($id)
    {
        $page =   Page::find($id);
        $menu_all   =   Menu::all();

        $parent_root_id = Page::orderBy('id','DESC')
            ->where('title_uri',$page->title_uri)->first();
        $parent_id_for = Menu::orderBy('id','DESC')
            ->where('slug',$parent_root_id->title_uri)->first();

        return view('backend/page/edite',compact('page','menu_all','parent_id_for'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PageUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'title_uri' => 'required',
            // 'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

       
        $slug = $request->title_uri;
        $page = Page::find($id);
       
    if ($request->hasFile('image')) {
            
         $image =$request->file('image');
         $fullName = time().'.'.$image->getClientOriginalExtension();
        @unlink('upload/page/'.$page->image);
         Image::make($image)->resize(500,600)->save('upload/page/'.$fullName);
         $page->image = $fullName;
         $page->save();
        }else {
            $fullName = $page->image;
        }

        $page->title = $request->title;
        $page->title_uri = $slug;
        $page->short = $request->short;
        $page->description = $request->description;
        $page->meta_title = $request->meta_title;
        $page->meta_des = $request->meta_des;
        $page->image = $fullName;
        $page->save();
        return redirect()->route('PageIndex')->with('successMsg','Page Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PageDelete($id)
    {
        $page = Page::find($id);
        if (file_exists('upload/page/'.$page->image))
        {
            unlink('upload/page/'.$page->image);
        }
        $page->delete();
        return redirect()->back()->with('successMsg','Page Successfully Deleted');
    }


    public function details($slug){

       $data['page'] = Page::where('title_uri',$slug)->first();
       $data['sliders'] = Slider::all();
        $data['socialIcon'] = SocialIcon::all();
       
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['main']   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        return view('fontend/single_page/details',$data);

       
    }




}
