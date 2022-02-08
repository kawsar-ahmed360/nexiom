<?php

namespace App\Http\Controllers\fontend;

use App\ClientManage;
use App\compare;
use App\Http\Controllers\Controller;
use App\PartnerManage;
use App\ProductDetailsAddMore;
use App\ProGallery;
use App\VisitorCount;
use Illuminate\Http\Request;
use App\SocialIcon;
use App\ContactUs;
use App\Slider;
use App\ContactUsTwo;
use App\Page;
use App\Menu;
use App\Service;
use App\GalleryCategory;
use App\About;
use App\AllPatient;
use App\Consultnt;
use App\Counter;
use App\Gallery;
use App\Logo;
use App\NewsEvent;
use App\ProductCategory;
use App\Products;
use App\SimpleSlider;
use App\Supported;
use App\HomeSeo;
use App\TechonoPageSeo;
use App\BlogPageSeo;
use App\SpecialOffer;
use Illuminate\Support\Facades\DB;

class FontController extends Controller
{
    public function MainIndex(){

    	$data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['home'] = HomeSeo::where('id','1')->first();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();
        $data['fe_product'] = Products::where('status','2')->get();

        $user_ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d');

        $viewcount = VisitorCount::where('user_ip',$user_ip)->whereDate('created_at',$date)->first();

        if ($viewcount) {
            VisitorCount::where('user_ip',$user_ip)->whereDate('created_at',$date)->increment('viewcount');
        }else{
            $store =new VisitorCount();
            $store->user_ip = $user_ip;
            $store->viewcount = 1;
            $store->save();
        }

    	return view('fontend/home',$data);
    }
    
    public function CategoryProduct($id){
        
        $id = base64_decode($id);
        
        
        	$data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['home'] = HomeSeo::where('id','1')->first();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();
        $data['fe_product'] = Products::where('status','2')->get();
        
        $data['products'] = Products::where('cat_id',$id)->get();
        $data['category_name'] = ProductCategory::where('id',$id)->first();

     

    	return view('fontend/single_page/cat_product',$data);
        
       
    }


    public function FilterSearchProd(Request $request){

        $data['product'] = Products::where("product_name","LIKE","%".$request->Searchval."%")
            ->orWhere("des","LIKE","%".$request->Searchval."%")
            ->get();
        return view('fontend/single_page/filter/filter_search',$data);
    }

    public function CompareSection($pro_id){

        $pro_id = base64_decode($pro_id);


        $session = session()->getId();

        $exists = compare::where('session_id',$session)->where('pro_id',$pro_id)->exists();

        if($exists){
            $noti = array(
                'message'=>'This Product Already Added',
                'alert-type'=>'error'
            );

            return redirect()->back()->with($noti);
        }

        $store = new compare();
        $store->session_id = $session;
        $store->pro_id = $pro_id;
        $store->save();

        $noti = array(
            'message'=>'successfully added',
            'alert-type'=>'success'
        );

        return redirect()->route('CompareView')->with($noti);
    }

    public function CompareView(){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['home'] = HomeSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();
        $data['category'] = ProductCategory::get();

        $session = session()->getId();
        $data['comp'] = compare::with('Product')->where('session_id',$session)->get();

//        dd($data['comp']);

        return view('fontend.single_page.compare',$data);
    }


    public function stringProductFilter(Request $request){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['home'] = HomeSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();
        $data['category'] = ProductCategory::get();

      if($request->str){

            $query = DB::table('Products');

                $query->orwhere('product_name','LIKE',"{$request->str}%");


            $data['products'] = $query->get();

//            $data['products'] = Products::where('product_name','LIKE',"{$request->str}%")->get();
        }else{
            $query = DB::table('Products');
            $data['products'] = $query->get();
        }


        return view('fontend/single_page/filter/str_filter',$data);

    }

    public function CategoryProductFilter(Request $request){


        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['home'] = HomeSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();
        $data['category'] = ProductCategory::get();


         if($request->cat){


            $query = DB::table('Products');
            foreach ($request->cat as $key => $cats) {
                $query->orwhere('cat_id',$cats);
            }

            $data['products'] = $query->get();

//            $data['products'] = Products::where('product_name','LIKE',"{$request->str}%")->get();
        }else{
            $query = DB::table('Products');
            $data['products'] = $query->get();
        }


        return view('fontend/single_page/filter/str_filter',$data);
    }

    public function AllPorductShow(){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['home'] = HomeSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();
        $data['products'] = Products::get();
        $data['category'] = ProductCategory::get();


        return view('fontend/single_page/All_Product',$data);
    }

    public function ProductDetails($slug){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();
        $data['spacial_offer'] = SpecialOffer::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['home'] = HomeSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['part'] = PartnerManage::get();
        $data['cli'] = ClientManage::get();

        $data['product_detailsss'] = Products::where('slug',$slug)->first();
        $data['pro_gallery'] = ProGallery::where('pro_id',$data['product_detailsss']->id)->get();
        $data['add_info'] = ProductDetailsAddMore::where('pro_id',$data['product_detailsss']->id)->get();
        $data['related_pro'] = Products::where('cat_id',$data['product_detailsss']->cat_id)->get();

        return view('fontend/single_page/product_details',$data);

    }

    public function SeachingSystem(Request $request){


        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['news'] = Page::where('title', 'LIKE', "%$request->search%")->orWhere('description', 'LIKE', "%$request->search%")->first();
        

    	return view('fontend/single_page/search',$data);


    }

    public function AllConsultnt(){
      
        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['consultnt'] = TechonoPageSeo::where('id','1')->first();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['all_consultnt'] = Consultnt::OrderBy('id','desc')->paginate(6);

    	return view('fontend/single_page/all_consultnt',$data);

    }

    public function AllClient(){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['consultnt'] = TechonoPageSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['all_consultnt'] = Consultnt::OrderBy('id','desc')->paginate(6);
        $data['clients'] = ClientManage::get();

        return view('fontend/single_page/all_client',$data);
    }

    public function ProductAllCategory(){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
        $data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $data['consultnt'] = TechonoPageSeo::where('id','1')->first();

        $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        $data['all_consultnt'] = Consultnt::OrderBy('id','desc')->paginate(6);

        $data['product_category'] = ProductCategory::get();


        return view('fontend/single_page/product_all_category',$data);
    }

    public function AllPatient(){

        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['all_patients'] = AllPatient::OrderBy('id','desc')->paginate(6);
        

    	return view('fontend/single_page/all_patient',$data);

    }

    public function AllNews(){
    
        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['NewsPageSeo'] = BlogPageSeo::where('id','1')->first();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['news'] = NewsEvent::OrderBy('id','desc')->get();
        

    	return view('fontend/single_page/all_news',$data);

    }


    public function AllService(){

 
        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['NewsPageSeo'] = BlogPageSeo::where('id','1')->first();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        // $data['news'] = NewsEvent::OrderBy('id','desc')->paginate(6);

        $data['service'] = Service::get();
        

    	return view('fontend/single_page/all_service',$data);

    }


    public function AllBlogs(){
    
        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['NewsPageSeo'] = BlogPageSeo::where('id','1')->first();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['blogs'] = NewsEvent::OrderBy('id','desc')->get();

        $data['recent_post'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        

    	return view('fontend/single_page/all_blog',$data);

    }

    public function SinglePatient($slug){
      
        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['patient_details'] = AllPatient::where('slug',$slug)->first();
        
        
        return view('fontend/single_page/patient_details',$data);

    }


    public function SingleNews($slug){

        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();


            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();
        
        $data['single_news'] = NewsEvent::where('slug',$slug)->first();

        $data['popular_post'] = NewsEvent::OrderBy('id','desc')->take(4)->get();
        

    	return view('fontend/single_page/news_details',$data);


    }

    public function ServiceSingle($slug){
    	$data['socialIcon'] = SocialIcon::get();
    	
    	$data['slider'] = Slider::get();
         $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
    	$data['object'] = Page::where('id','3')->first();
        $data['logo'] = Logo::where('id','1')->first();
         $data['service_details'] = Service::where('slug',$slug)->first();
         $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();
    	return view('fontend/single_page/service_details',$data);
    }

    public function AboutSingle($id){

        $id = base64_decode($id);

        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['single_about'] = About::where('id',$id)->first();
    	return view('fontend/single_page/about',$data);
    }

    public function SpecialOfferSingle($id){
        $data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slide'] = Slider::get();
        $data['ProductCategory'] = ProductCategory::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
        $data['logo'] = Logo::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['About'] = About::where('id','1')->first();
    	$data['object'] = Page::where('id','5')->first();
        // $object = Page::where('title_uri',$slug)->first();
        $data['counter'] = Counter::where('id','1')->first();

    	 $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['all_patient'] = AllPatient::get();
        $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
        $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
        $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
        $data['supported'] = Supported::get();

        $data['special_Offer'] = SpecialOffer::where('id',$id)->first();
    	return view('fontend/single_page/special_offer_details',$data);

    }


    public function ContactUs(){

    	$data['socialIcon'] = SocialIcon::get();
    	$data['Service'] = Service::get();
    	$data['slider'] = Slider::get();
        $data['simple_slider'] = SimpleSlider::get();
    	$data['contact'] = ContactUs::where('id','1')->first();
    	$data['contact_two'] = ContactUsTwo::where('id','1')->first();
    	$data['object'] = Page::where('id','3')->first();
        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();
        
        $data['logo'] = Logo::where('id','1')->first();
    	return view('fontend/single_page/ContactUs',$data);
    }

    public function Gallery(){
      
      $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slider'] = Slider::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['gallery'] = Gallery::get();
        // $data['category'] = GalleryCategory::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['object'] = Page::where('id','3')->first();
        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();


            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();

        $data['logo'] = Logo::where('id','1')->first();

        return view('fontend/single_page/gallery',$data);    

    }

    public function AboutDetails(){

         $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slider'] = Slider::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['category'] = GalleryCategory::get();
        // $data[''] = GalleryCategory::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['object'] = Page::where('id','3')->first();
        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();
              $data['About'] = About::where('id','1')->first();

        $data['logo'] = Logo::where('id','1')->first();

        return view('fontend/single_page/about_details',$data);
    }

    public function ProductwiseCat($id){


         $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slider'] = Slider::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['category'] = GalleryCategory::get();
        // $data[''] = GalleryCategory::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['object'] = Page::where('id','3')->first();
        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();
       $data['About'] = About::where('id','1')->first();

        $data['logo'] = Logo::where('id','1')->first();
        $data['catwise'] =Products::where('cat_id',$id)->take(8)->get();

        return view('fontend/single_page/cat_wise_product',$data);
    }  


      public function productall(){


         $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slider'] = Slider::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['category'] = GalleryCategory::get();
        // $data[''] = GalleryCategory::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['object'] = Page::where('id','3')->first();
        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();
       $data['About'] = About::where('id','1')->first();

        $data['logo'] = Logo::where('id','1')->first();
        $data['product'] =Products::get(); 

        return view('fontend/single_page/product',$data);
    }


    public function Donation(){

        $data['socialIcon'] = SocialIcon::get();
        $data['Service'] = Service::get();
        $data['slider'] = Slider::get();
        $data['simple_slider'] = SimpleSlider::get();
        $data['category'] = GalleryCategory::get();
        // $data[''] = GalleryCategory::get();
        $data['contact'] = ContactUs::where('id','1')->first();
        $data['contact_two'] = ContactUsTwo::where('id','1')->first();
        $data['object'] = Page::where('id','3')->first();
        $data['main'] = Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

            $data['quick_link'] = Menu::orderBy('sequence','ASC')
            ->where('important_link','important_link')
            ->get();
       $data['About'] = About::where('id','1')->first();

        $data['logo'] = Logo::where('id','1')->first();
        $data['product'] =Products::get();

        return view('fontend.single_page.donation',$data);


    }
}
