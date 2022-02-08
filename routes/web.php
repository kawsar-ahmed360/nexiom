<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',function(){
//     return view('fontend.master');
// });



route::get('/','fontend\FontController@MainIndex')->name('MainIndex');
route::get('/service_single_page/{slug}','fontend\FontController@ServiceSingle')->name('ServiceSingle');
route::get('/about_single_page/{id}','fontend\FontController@AboutSingle')->name('AboutSingle');
route::get('/special_offer/{id}','fontend\FontController@SpecialOfferSingle')->name('SpecialOfferSingle');
route::get('/contact','fontend\FontController@ContactUs')->name('ContactUs');
route::post('/contact-store','fontend\ContactFormController@ContactStore')->name('ContactStore');
route::get('/gallery','fontend\FontController@Gallery')->name('Gallery');


Route::get('page/{slug}','admin\PageController@details')->name('page.details');
route::get('About/about-details','fontend\FontController@AboutDetails')->name('AboutDetails');


route::get('categorys_product/{id}','fontend\FontController@CategoryProduct')->name('CategoryProduct');


//------------------------Product Filtering-------------
route::get('str-product-filter','fontend\FontController@stringProductFilter')->name('stringProductFilter');
route::get('str-category-filter','fontend\FontController@CategoryProductFilter')->name('CategoryProductFilter');

//-------------------Compare section-------------------

route::get('compare/{pro_id}','fontend\FontController@CompareSection')->name('CompareSection');
route::get('compare_view/','fontend\FontController@CompareView')->name('CompareView');


route::get('all-product-s','fontend\FontController@AllPorductShow')->name('AllPorductShow');
route::get('product-details/{slug}','fontend\FontController@ProductDetails')->name('ProductDetails');


route::get('cat_Product/product-wiseCat/{id}','fontend\FontController@ProductwiseCat')->name('ProductwiseCat');
route::get('product','fontend\FontController@productall')->name('productall');

route::get('all-client','fontend\FontController@AllClient')->name('AllClient');

//------------------Product All Category-------------------

route::get('/product-all-category','fontend\FontController@ProductAllCategory')->name('ProductAllCategory');


//....................Single News.................................
route::get('all_blogs','fontend\FontController@AllBlogs')->name('AllBlogs');
route::get('all_news','fontend\FontController@AllNews')->name('AllNews');
route::get('single_news/{slug}','fontend\FontController@SingleNews')->name('SingleNews');
route::post('archive_system','fontend\FontController@ArchiveSystem')->name('ArchiveSystem');




//.....................Patient Details......................
route::get('all_patient','fontend\FontController@AllPatient')->name('AllPatient');
route::get('single_patient/{slug}','fontend\FontController@SinglePatient')->name('SinglePatient');

//.....................All Consultnt...................
route::get('all_consultnt','fontend\FontController@AllConsultnt')->name('AllConsultnt');
route::get('single_consultnt/{slug}','fontend\FontController@SingleConsultnt')->name('SingleConsultnt');

//..............................All Service Section.......................

route::get('all_service','fontend\FontController@AllService')->name('AllService');


//.............................Donation Section..........................
route::get('donation','fontend\FontController@Donation')->name('Donation');

//.......................Search System.....................

route::post('searching','fontend\FontController@SeachingSystem')->name('SeachingSystem');
route::get('filter_seatch','fontend\FontController@FilterSearchProd')->name('FilterSearchProd');



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware' => 'auth','namespace'=>'admin'], function() {


    //---------------------Partners------------------

    route::get('partners/parners-index','PartnersController@ParnersIndex')->name('ParnersIndex');
    route::post('partners/parners-store','PartnersController@ParnersStore')->name('ParnersStore');
    route::post('partners/parners-update','PartnersController@ParnersUpdate')->name('ParnersUpdate');
    route::get('partners/parners-delete/{id}','PartnersController@ParnersDelete')->name('ParnersDelete');

    //-----------------Client----------------

    route::get('Clients/client-index','ClientManageController@ClientIndex')->name('ClientIndex');
    route::post('Clients/client-store','ClientManageController@ClientStore')->name('ClientStore');
    route::post('Clients/client-update','ClientManageController@ClientUpdate')->name('ClientUpdate');
    route::get('Clients/client-delete/{id}','ClientManageController@ClientDelete')->name('ClientDelete');

 //............................Menu Area..............

	route::get('Menu/menu-create','MenuController@MenuCreate')->name('MenuCreate');
	route::post('Menu/menu-store','MenuController@MenuStore')->name('MenuStore');
	route::get('Menu/menu-index','MenuController@MenuIndex')->name('MenuIndex');
	route::get('Menu/menu-ajax-search','MenuController@Menusearchajax')->name('Menusearchajax');
	route::get('Menu/menu-edite/{id}','MenuController@MenuEdite')->name('MenuEdite');
	route::post('Menu/menu-update/{id}','MenuController@MenuUpdate')->name('MenuUpdate');
	route::get('Menu/menu-delete/{id}','MenuController@MenuDelete')->name('MenuDelete');

   //.................................Slider Section......................

	route::get('Slider/slider-create','SliderControler@SliderCreate')->name('SliderCreate');
	route::post('Slider/slider-store','SliderControler@SliderStore')->name('SliderStore');
	route::get('Slider/slider-index','SliderControler@SliderIndex')->name('SliderIndex');
	route::get('Slider/slider-edite/{id}','SliderControler@SliderEdite')->name('SliderEdite');
	route::post('Slider/slider-update','SliderControler@SliderUpdate')->name('SliderUpdate');
	route::get('Slider/slider-delete/{id}','SliderControler@SliderDelete')->name('SliderDelete');

	//................................Contact Us.............................

    route::get('Contact_one/contact-index','ContactUsController@ContactIndex')->name('ContactIndex');
	route::get('Contact_one/contact-edite/{id}','ContactUsController@ContactEdite')->name('ContactEdite');
	route::post('Contact_one/contact-update','ContactUsController@ContactUpdate')->name('ContactUpdate');
	route::get('Contact_one/contact-delete/{id}','ContactUsController@ContactDelete')->name('ContactDelete');

		//................................Contact Two Us.............................

    route::get('Contacttow/contacttow-index','ContactUsTwoController@ContactTwoIndex')->name('ContactTwoIndex');
	route::get('Contacttow/contacttow-edite/{id}','ContactUsTwoController@ContactTwoEdite')->name('ContactTwoEdite');
	route::post('Contacttow/contacttow-update','ContactUsTwoController@ContactTwoUpdate')->name('ContactTwoUpdate');
	route::get('Contacttow/contacttow-delete/{id}','ContactUsTwoController@ContactTowDelete')->name('ContactTowDelete');


			//................................Social Icon .............................

    route::get('Social/social-create','SocialIconController@SocialCreate')->name('SocialCreate');
    route::post('Social/social-store','SocialIconController@SocialStore')->name('SocialStore');
    route::get('Social/social-index','SocialIconController@SocialIndex')->name('SocialIndex');
	route::get('Social/social-edite/{id}','SocialIconController@SocialEdite')->name('SocialEdite');
	route::post('Social/social-update','SocialIconController@SocialUpdate')->name('SocialUpdate');
	route::get('Social/social-delete/{id}','SocialIconController@SocialDelete')->name('SocialDelete');

	//...........................................Page Controller.......................
	 route::get('Page/page-create','PageController@PageCreate')->name('PageCreate');
    route::post('Page/page-store','PageController@PageStore')->name('PageStore');
    route::get('Page/page-index','PageController@PageIndex')->name('PageIndex');
    route::get('Page/page-edite/{id}','PageController@PageEdite')->name('PageEdite');
    route::post('Page/page-update/{id}','PageController@PageUpdate')->name('PageUpdate');
    route::get('Page/page-delete/{id}','PageController@PageDelete')->name('PageDelete');
    // route::get('Page/page-details/{slug}','PageController@details')->name('details');


    //....................................Service Controller.......................
    
	route::get('Service/service-create','ServiceController@ServiceCreate')->name('ServiceCreate');
    route::post('Service/service-store','ServiceController@ServiceStore')->name('ServiceStore');
    route::get('Service/service-index','ServiceController@ServiceIndex')->name('ServiceIndex');
    route::get('Service/service-edite/{id}','ServiceController@ServiceEdite')->name('ServiceEdite');
    route::post('Service/service-update','ServiceController@ServiceUpdate')->name('ServiceUpdate');
    route::get('Service/service-delete/{id}','ServiceController@ServiceDelete')->name('ServiceDelete');


    //..............................Mail send form Customer.......................

    route::get('Mail/mail-send','MailSendController@MailSend')->name('MailSend');
    route::get('Mail/mail-index','MailSendController@MailIndex')->name('MailIndex');
    route::post('Mail/mail-submit','MailSendController@MailSubmit')->name('MailSubmit');
    route::get('Mail/mail-delete/{id}','MailSendController@MailDelete')->name('MailDelete');


    //................................Gallery Controller.............................

    route::get('Gallery/category-index','GalleryController@CategoryIndex')->name('CategoryIndex');
    route::get('Gallery/category-create','GalleryController@CategoryCreate')->name('CategoryCreate');
    route::post('Gallery/category-store','GalleryController@CategoryStore')->name('CategoryStore');
    route::get('Gallery/category-edite/{id}','GalleryController@CategoryEdite')->name('CategoryEdite');
    route::post('Gallery/category-update/{id}','GalleryController@CategoryUpdate')->name('CategoryUpdate');
    route::get('Gallery/category-delete/{id}','GalleryController@CategoryDelete')->name('CategoryDelete');

    route::get('Gallery/gallery-create','GalleryController@GalleryCreate')->name('GalleryCreate');
    route::post('Gallery/gallery-store','GalleryController@GalleryStore')->name('GalleryStore');
    route::get('Gallery/gallery-index','GalleryController@GalleryIndex')->name('GalleryIndex');
    route::get('Gallery/gallery-edite/{id}','GalleryController@GalleryEdite')->name('GalleryEdite');
    route::post('Gallery/gallery-update/{id}','GalleryController@GalleryUpdate')->name('GalleryUpdate');
    route::get('Gallery/gallery-delete','GalleryController@GalleryDelete')->name('GalleryDelete');


       //...................................Logo Section.......................

    route::get('Logo/logo-index','LogoController@LogoIndex')->name('LogoIndex');
    route::get('Logo/logo-edite/{id}','LogoController@LogoEdite')->name('LogoEdite');
    route::post('Logo/logo-update/{id}','LogoController@LogoUpdate')->name('LogoUpdate');
    // route::get('Logo/logo-delete/{id}','LogoController@LogoDelete')->name('LogoDelete');

    //..............................About Section...................

    route::get('About/about-index','AboutController@AboutIndex')->name('AboutIndex');
    route::get('About/about-edite/{id}','AboutController@AboutEdite')->name('AboutEdite');
    route::post('About/about-update','AboutController@AboutUpdate')->name('AboutUpdate');
    route::get('About/about-delete/{id}','AboutController@AboutDelete')->name('AboutDelete');




        //..............................Special Offer Section...................

        route::get('Special/SpecialOffer-index','SpacialOfferController@SpecialOfferIndex')->name('SpecialOfferIndex');
        route::get('Special/SpecialOffer-edite/{id}','SpacialOfferController@SpecialOfferEdite')->name('SpecialOfferEdite');
        route::post('Special/SpecialOffer-update','SpacialOfferController@SpecialOfferUpdate')->name('SpecialOfferUpdate');
        route::get('Special/SpecialOffer-delete/{id}','SpacialOfferController@SpecialOfferDelete')->name('SpecialOfferDelete');




    //..........................................Product Section......................................

    route::get('Product/product_category-index','ProductController@ProductCategoryIndex')->name('ProductCategoryIndex');
    route::get('Product/product_category-create','ProductController@ProductCategoryCreate')->name('ProductCategoryCreate');
    route::post('Product/product_category-store','ProductController@ProductCategoryStore')->name('ProductCategoryStore');
    route::get('Product/product_category-edite/{id}','ProductController@ProductCategoryEdite')->name('ProductCategoryEdite');
    route::post('Product/product_category-update/{id}','ProductController@ProductCategoryUpdate')->name('ProductCategoryUpdate');
    route::get('Product/product_category-delete/{id}','ProductController@ProductCategoryDelete')->name('ProductCategoryDelete');

    route::get('Product/product-create','ProductController@ProductCreate')->name('ProductCreate');
    route::post('Product/product-store','ProductController@ProductStore')->name('ProductStore');
    route::get('Product/product-index/{cat_id}','ProductController@ProductIndex')->name('ProductIndex');
    route::get('Product/product-edite/{id}','ProductController@ProductEdite')->name('ProductEdite');
    route::post('Product/product-update/{id}','ProductController@ProductUpdate')->name('ProductUpdate');
    route::get('Product/product-delete/{id}','ProductController@ProductDelete')->name('ProductDelete');

    route::get('Product/cat-product-index','ProductController@ProductCatWiseIndex')->name('ProductCatWiseIndex');
//    route::get('Product/cat-wise-product-view-index/{cat_id}','ProductController@ProductCatWiseProductViewIndex')->name('ProductCatWiseProductViewIndex');

    route::get('Product/product-active/{id}','ProductController@ProductActive')->name('ProductActive');
    route::get('Product/product-deactive/{id}','ProductController@ProductDeactive')->name('ProductDeactive');
    route::get('Product/product-details-addmore/{pro_id}','ProductController@ProductDetailsAddMore')->name('ProductDetailsAddMore');
    route::post('Product/product-details-addmore_post','ProductController@ProductDetailsAddMorePost')->name('ProductDetailsAddMorePost');


    
    //...................Password Change Section......................

    route::get('password_change/{id}','PasswordChange@ChangePas')->name('ChangePas');
    route::post('password_change_update','PasswordChange@ChangePassUpdate')->name('ChangePassUpdate');



    //.................................All Pations..................................

    route::get('AllPatient/patient-create','AllPatientController@AllPatientCreate')->name('AllPatientCreate');
    route::post('AllPatient/patient-store','AllPatientController@AllPatientStore')->name('AllPatientStore');
    route::get('AllPatient/patient-index','AllPatientController@AllPatientIndex')->name('AllPatientIndex');
    route::get('AllPatient/patient-edite/{id}','AllPatientController@AllPatientEdite')->name('AllPatientEdite');
    route::post('AllPatient/patient-update','AllPatientController@AllPatientUpdate')->name('AllPatientUpdate');
    route::get('AllPatient/patient-delete/{id}','AllPatientController@AllPatientDelete')->name('AllPatientDelete');



        //.................................All Consultnt..................................

        // route::get('Consultnt/consultnt-create','ConsultntController@ConsultntCreate')->name('ConsultntCreate');
        route::post('Consultnt/consultnt-store','ConsultntController@ConsultntStore')->name('ConsultntStore');
        route::get('Consultnt/consultnt-index','ConsultntController@ConsultntIndex')->name('ConsultntIndex');
        // route::get('Consultnt/consultnt-edite/{id}','ConsultntController@ConsultntEdite')->name('ConsultntEdite');
        route::post('Consultnt/consultnt-update','ConsultntController@ConsultntUpdate')->name('ConsultntUpdate');
        route::get('Consultnt/consultnt-delete/{id}','ConsultntController@ConsultntDelete')->name('ConsultntDelete');


        //............................Counter Section........................
        route::post('Counter/counter-store','CounterContrller@CounterStore')->name('CounterStore');
        route::get('Counter/counter-index','CounterContrller@CounterIndex')->name('CounterIndex');
        // route::get('Counter/Counter-edite/{id}','CounterContrller@CounterEdite')->name('CounterEdite');
        route::post('Counter/counter-update','CounterContrller@CounterUpdate')->name('CounterUpdate');
        route::get('Counter/counter-delete/{id}','CounterContrller@CounterDelete')->name('CounterDelete');


           //............................Our Supported........................
           route::post('Supported/supported-store','OurSupported@SupportedStore')->name('SupportedStore');
           route::get('Supported/supported-index','OurSupported@SupportedIndex')->name('SupportedIndex');
           // route::get('Supported/Supported-edite/{id}','OurSupported@SupportedEdite')->name('SupportedEdite');
           route::post('Supported/supported-update','OurSupported@SupportedUpdate')->name('SupportedUpdate');
           route::get('Supported/supported-delete/{id}','OurSupported@SupportedDelete')->name('SupportedDelete');


               //.......................News&Event.......................

     route::get('News/news_create','NewsEventController@NewsCreate')->name('NewsCreate');
     route::get('News/news_index','NewsEventController@NewsIndex')->name('NewsIndex');
     route::post('News/news_store','NewsEventController@NewsStore')->name('NewsStore');
     route::get('News/news_edite/{id}','NewsEventController@NewsEdite')->name('NewsEdite');
     route::post('News/news_update','NewsEventController@NewsUpdate')->name('NewsUpdate');
     route::get('News/news_delete/{id}','NewsEventController@NewsDelete')->name('NewsDelete');
     route::get('News/news_single_view/{id}','NewsEventController@NewsSingleView')->name('NewsSingleView');




     //.................................Seo Setting Controller............................

    //.....................ALL Techonology Page Seo ......................
    Route::get('SeoSetting/Techology_Page','SeoSetting\SeoSettingController@TechonologyPageSeo')->name('TechonologyPageSeo');
    Route::post('SeoSetting/Techology_Page_post','SeoSetting\SeoSettingController@TechonologyPageSeoPost')->name('TechonologyPageSeoPost');

  //.....................ALL Techonology Page Seo ......................
   Route::get('SeoSetting/blog_Page','SeoSetting\SeoSettingController@BlogPageSeo')->name('BlogPageSeo');
    Route::post('SeoSetting/blog_Page_post','SeoSetting\SeoSettingController@BlogPageSeoPost')->name('BlogPageSeoPost');


       //.....................Contact Page Seo ......................
   Route::get('SeoSetting/contact_Page','SeoSetting\SeoSettingController@ContactPageSeo')->name('ContactPageSeo');
   Route::post('SeoSetting/contact_Page_post','SeoSetting\SeoSettingController@ContactPageSeoPost')->name('ContactPageSeoPost');

   //........................Main Seo.....................................

       //.....................Contact Page Seo ......................
   Route::get('SeoSetting/home_Page_seo','SeoSetting\SeoSettingController@HomepageSeo')->name('HomepageSeo');
   Route::post('SeoSetting/home_Page_seo_post','SeoSetting\SeoSettingController@HomepageSeoPost')->name('HomepageSeoPost');





});

