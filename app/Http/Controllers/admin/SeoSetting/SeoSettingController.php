<?php

namespace App\Http\Controllers\admin\SeoSetting;

use App\BlogPageSeo;
use App\ContactPageSeo;
use App\HomeSeo;
use App\Http\Controllers\Controller;
use App\TechonoPageSeo;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function TechonologyPageSeo(){

         $data['techologory'] = TechonoPageSeo::get();

         return view('backend.seo_setting.technoloy_page',$data);
    }

    public function TechonologyPageSeoPost(Request $request){

         $update =  TechonoPageSeo::where('id',$request->edite_id)->first();
         $update->meta_title = $request->meta_title;
         $update->meta_des = $request->meta_des;
         $update->save();
           
         $noti = array(
             'message'=>'Data Successfully Inserted',
             'alert-type'=>'success'
         );
         return redirect()->back()->with($noti);
    }



    //.........................Blog Page Seo Section.....................

    public function BlogPageSeo(){

        $data['blog_page_seo'] = BlogPageSeo::get();

        return view('backend.seo_setting.blog_page_seo',$data);
    }

    public function BlogPageSeoPost(Request $request){

        $update = BlogPageSeo::where('id',$request->edite_id)->first();
        $update->meta_title = $request->meta_title;
        $update->meta_des = $request->meta_des;
        $update->save();

        $noti = array(
            'message'=>'data successfully upldated',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }


    //..........................Contact Page SEO Section........................

    public function ContactPageSeo(){

        $data['contact_seo'] = ContactPageSeo::get();

        return view('backend.seo_setting.contact_page_seo',$data);
    }

    public function ContactPageSeoPost(Request $request){
         $update = ContactPageSeo::where('id',$request->edite_id)->first();
         $update->meta_title = $request->meta_title;
         $update->meta_des = $request->meta_des;
         $update->save();

         $noti = array(
             'message'=>'data successfully Updated',
             'alert-type'=>'success'
         );

         return redirect()->back()->with($noti);
    }


    //..........................Home Page Seo..................

    public function HomepageSeo(){

        $data['home_seo'] = HomeSeo::get();

        return view('backend.seo_setting.home_seo',$data);
    }

    public function HomepageSeoPost(Request $request){

        $update = HomeSeo::where('id',$request->edite_id)->first();
        $update->meta_title = $request->meta_title;
        $update->meta_des = $request->meta_des;
        $update->save();

        $noti = array(
            'message'=>'data successfully Updated',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }
}
