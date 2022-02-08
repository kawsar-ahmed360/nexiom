@extends('fontend/master')


@section('title'){{@$home->meta_title}}@endsection
@section('meta_title'){{@$home->meta_title}}@endsection
@section('meta_des'){{@$home->meta_title}}@endsection


@section('slider')



<section id="mainSlider">
    <div id="owl-main" class="owl-carousel">


        @foreach($slide as $key=>$sli)

            @if(@$key%2==0)
        <div class="item">
            <img src="{{($sli->image)?url('upload/slider/'.$sli->image):''}}" alt="logo_img" class="img-fluid">
            <div class="container">
                <div class="carousel-caption vertical-top text-center">
                    <h4 class="animate" data-anim-type="fadeInDown" data-anim-delay="300">{{$sli->title}}</h4>
                    <h1 class="animate" data-anim-type="fadeInDown" data-anim-delay="300">{!!$sli->sub_title!!}</span>
                    </h1>
                    <p class="animate" data-anim-type="fadeInUp" data-anim-delay="300">
                        {{@$sli->sort_description}}


                    </p>
                    <!-- <div class="fadeInRight-3">
                        <a href="#" class="btn btn-large animate" data-anim-type="fadeInUp" data-anim-delay="600">Learn
                            More <i class="fas fa-angle-double-right icon"></i></a>
                        <a href="#" class="btn btn-large btn-2 animate" data-anim-type="fadeInUp" data-anim-delay="600">Watch
                            video <i class="fab fa-youtube icon"></i></a>
                    </div> -->
                </div><!-- /.caption -->
            </div><!-- /.container -->
        </div><!-- /.item -->

            @else



        <div class="item">
            <img src="{{($sli->image)?url('upload/slider/'.$sli->image):''}}" alt="logo_img" class="img-fluid">
            <div class="container">
                <div class="carousel-caption vertical-top text-right">
                    <h4 class="animate" data-anim-type="fadeInDown" data-anim-delay="300">{{$sli->title}}</h4>
                    <h1 class="animate" data-anim-type="fadeInDown" data-anim-delay="300">{!!$sli->sub_title!!}</span>
                    </h1>
                    <p class="animate" data-anim-type="fadeInUp" data-anim-delay="300">
                       {{@$sli->sort_description}}

                    </p>
                    <!-- <div class="fadeInRight-3">
                        <a href="#" class="btn btn-large animate" data-anim-type="fadeInUp" data-anim-delay="600">Learn
                            More <i class="fas fa-angle-double-right icon"></i></a>
                        <a href="#" class="btn btn-large btn-2 animate" data-anim-type="fadeInUp" data-anim-delay="600">Watch
                            video <i class="fab fa-youtube icon"></i></a>
                    </div> -->
                </div><!-- /.caption -->
            </div><!-- /.container -->
        </div><!-- /.item -->
            @endif

            @endforeach
    </div><!-- /.owl-carousel -->
</section>


@endsection


@section('about')


<div class="about-us-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="about-us-wrapper mb-30">
                    <div class="section-title pos-rel mb-35">
                        <span class="border-left-1"></span>
                        <span>About Us</span>
                        <span class="border-right-1"></span>

                        <h2 class="animate" data-anim-type="fadeInLeft" data-anim-delay="900">{{$About->title}}</h2>
                    </div>
                    <div class="about-us-text pos-rel">
                        {!!$About->short!!}
                        <div class="about-button">
                            <a class="btn-1" href="{{route('AboutSingle',base64_encode($About->id))}}">ABOUT US <i class="far fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="about-us-img mb-30">
                    <img src="{{(@$About->image)?url('upload/about/'.@$About->image):''}}" alt="about1">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('partners')

    <section class="row testimonial-section  space animate" data-anim-type="fadeInLeft" data-anim-delay="900" id="testimonial">
        <div class="container">
            <div class="title-section center">
                <h2><span> OUR PARTNER</span></h2>
            </div>
            <div class="swiper-container home-tsetimonial">
                <div class="swiper-wrapper">
                    @foreach(@$part as $key=>$part)
                    <div class="swiper-slide">
                        <figure class="testimonial">
                            <a href="{{@$part->url}}">
                                <div class="pic-bg">
                                    <div class="pic">
                                        <img src="{{(@$part->image)?url('upload/Partners/'.@$part->image):''}}" alt="partner">
                                    </div>
                                </div>
                            </a>
                        </figure>
                    </div>
                        @endforeach

                </div>

                <div class="swiper-btn-center">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                    <div class="swiper-button-next swiper-button-white"></div>
                </div>
            </div>
        </div>
    </section>


    @endsection


@section('client')


    <section class="cta-area pt-120 pb-130" style="background-image:url(fontend/images/img/feature.jpg)">
        <div class="container">
            <div class="title-section1 center animate" data-anim-type="fadeInRight" data-anim-delay="900" >
                <h2><span>Our Client </span></h2>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-carousel">
                    <div class="owl-carousel carousel-main ">
                        @foreach(@$cli as $key=>$cli)
                        <div class="owl-client-custom"><a href="{{@$cli->url}}"> <img src="{{(@$cli->image)?url('upload/Client/'.@$cli->image):''}}"></a></div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

@section('service')
<div class="section panel-3 content-block1 dark" data-bg-color="#00c853" data-image-src="{{asset('fontend/images/upload/home-services-bg-image.jpg')}}">
   <div class="container">
        <div class="row">
            <div class="inner-wrapper">
                
                 <!--Block Title-->
                 <div class="block-title">
                     <h1>Services</h1>
                 </div>
                 <!--End-->
                 
             </div>
         
             <div class="animate-fadeIn">
             
                <!--Carousel Items Start-->
                 <div class="owl-carousel box-carousel-wrapper">
                 
                     @foreach($Service as $ser)
                     <!--Item 1 Start-->
                     <div class="carousel-item">
                         <div class="carousel-inner">
                             <figure>
                                 <img src="{{($ser->image)?url('upload/service/'.$ser->image):''}}" alt="thumbnail" />
                             </figure>
                             <div class="content-block-detail">
                                 <div class="fab green ripple">
                                     <a href="{{route('ServiceSingle',$ser->id)}}"><i class="fa fa-plus"></i></a>
                                 </div>
                                 <h3>{{$ser->title}}</h3>
                                 <div class="item-list-description">{{$ser->sub_title}}</div>
                             </div>
                         </div>
                     </div>
                     <!--Item 1 End-->

                     @endforeach
                     
                 
                     
                 </div>
                <!--Carousel Items End-->
             
             </div>
             
         </div>
     </div>
     <div class="overlay" data-bg-color="#00c853" data-opacity="0.6"></div>
 </div>
@endsection


@section('product')


    <!------new Section Code----------->

<section class="shiping-section ptb-40 pb-60" id="shiping">
    <div class="container">
        <div class="title-section2 center">
            <h2><span>Our Products </span></h2>
        </div>

    </div>
    <div class="swiper-container shipping-bg">
        <div class="swiper-container shiping-datas">
            <div class="swiper-container container swiper1">
                <div class="swiper-wrapper">

                 @foreach(@$fe_product as $key=>$pro)
                    <div class="swiper-slide">
                        <figure class="col-md-12 shiping-desc">
                            <div class="img-thumbnail">
                                <img class="img-fluid" src="{{($pro->product_image)?url('upload/product_image/'.$pro->product_image):''}}" alt="EXPORT / IMPORT">
                            </div>
                            <figcaption class="shiping-detail">
                                <div class="shiping-data">
                                    <h3><a href="{{route('ProductDetails',@$pro->slug)}}">{{@$pro->product_name}}</a></h3>
                                </div>
                                <div class="button"><a href="{{route('ProductDetails',@$pro->slug)}}" class="btn">Read More</a></div>
                            </figcaption>
                        </figure>
                    </div>

                  @endforeach


                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev swiper-button-prev6"><i class="fas fa-angle-double-left"></i></div>
            <div class="swiper-button-next swiper-button-next6"><i class="fas fa-angle-double-right"></i></div>
        </div>
    </div>
</section>









@endsection


@section('blog')

<div class="section panel-5 home-blog-panel dark" data-bg-color="#313131" data-image-src="fontend/images/upload/home-blog-bg-image.jpg">
   <div class="group-wrapper">
        <div class="container">
            <div class="row">
            
                <div class="inner-wrapper">
                    
                    <!--Block Title-->
                    <div class="block-title">
                        <h1>Blog</h1>
                    </div>
                    <!--End-->
                    
                </div>
                
                <div class="animate-fadeInUp">
                
                   <!--Carousel Items Start-->
                    <div class="owl-carousel box-carousel-wrapper">
                    
                         @foreach($news as $n)
                        <!--Item 1 Start-->
                        <div class="carousel-item">
                            <div class="carousel-inner">
                                <figure>
                                    <img src="{{($n->image)?url('upload/news/'.$n->image):''}}" alt="thumbnail" />
                                </figure>
                                <div class="content-block-detail">
                                    <div class="fab green ripple">
                                        <a href="{{route('SingleNews',$n->slug)}}"><i class="fa fa-plus"></i></a>
                                    </div>
                                    <h3>{{$n->title}}</h3>
                                    <div class="item-list-description">{!!$n->summery!!}</div>
                                </div>
                                <div class="blog-meta number">
                                   
                                </div>
                            </div>
                        </div>
                        <!--Item 1 End-->


                        @endforeach
                        
                    
                    
                    </div>
                   <!--Carousel Items End-->
               
                </div>
                
            </div>
        </div>
    </div>
    
    <!--More Item Link-->
    <div class="more-item-link">
       <a href="blog.html">All Articles</a>
    </div>
    <!--End-->
    
    <div class="overlay" data-bg-color="#313131" data-opacity="0.6"></div>
</div>
@endsection


@section('special_offer')
<div class="section panel-6 content-block3 vertical-top text-right" data-midnight="darkColor" data-bg-color="#fff" data-image-src="images/blank.gif">
   <div class="container-fluid">
        <div class="row">
         
            <!--Image Left-->
            <div class="col-md-6 image-block img-height fit-img animate-fadeInLeft">
            <figure>
               <img style="height:500px" src="{{($spacial_offer->image)?url('upload/Spacial_offer/'.$spacial_offer->image):''}}" alt="image" />
            </figure>
             </div>
             <!--End-->
             
             <!--Text Right-->
             <div class="col-md-6 text-block content-height">
                <div data-height="30"></div>
                <div class="animate-fadeInRight">
                     <h2>{{$spacial_offer->title}}</h2>
                  
                     <p>{!!$spacial_offer->short_title!!}</p>
                     <div data-height="23"></div>
                     <div class="button raised green ripple">
                         <a href="{{route('SpecialOfferSingle',$spacial_offer->id)}}">Read More Details</a>
                     </div>
                 </div>
             </div>
             <!--End-->
             
         </div>
     </div>
    <div class="overlay" data-bg-color="#fff" data-opacity="0"></div>
 </div>

@endsection


@section('contact_us')


<div class="section panel-7 home-contact-panel dark" data-bg-color="#00c853" data-image-src="fontend/images/upload/home-contact-bg.html">
   <div class="container">
        <div class="row">
            
             <div class="inner-wrapper">
                
                 <!--Block Title-->
                 <div class="block-title">
                     <h1>Contact Us</h1>
                 </div>
                 <!--End-->
                 
             </div>
             
             <!--Input Field Box Start-->
             <div class="col-md-8">
                <div class="box contact-form-wrapper">
                 
                     <form id="form_contact" action="{{route('ContactStore')}}" class="submit-form" method="POST">
                         @csrf
                         
                         <!--Name and Email Field Box-->
                         <div class="row">
                             <div class="col-sm-6 addpadding">
                                 <div class="box text-input">
                                     <input id="name" type="text" name="name" required />
                                     <label>Your Name</label>
                                     <span></span>
                                 </div>
                             </div>
                             <div class="col-sm-6 addpadding">
                                 <div class="box text-input">
                                     <input id="email" type="text" name="email" required />
                                     <label>Your email</label>
                                     <span></span>
                                 </div>
                             </div>
                         </div>


                           <!--Mpbile Number Field Box-->
                           <div class="box text-input">
                            <input id="phone_number" type="text" name="phone_number" required />
                            <label>Your Number</label>
                            <span></span>
                        </div>
                         
                         <!--Subject Field Box-->
                         <div class="box text-input">
                             <input id="msg_subject" type="text" name="msg_subject" required />
                             <label>Your subject</label>
                             <span></span>
                         </div>
                         
                         <!--Message Field Box-->
                         <div class="box text-input textarea">
                             <textarea id="message" name="message" required></textarea>
                             <label>Your message</label>
                             <span></span>
                         </div>
                         
                         <!--Submit Button-->
                         <div class="button raised dark-grey">
                             <input id="submit_message" type="submit" value="Send Your Message"/>
                         </div>
                         
                         <span class="loading"><i class="fa fa-spinner fa-pulse"></i></span>
                         
                         <div class="clearfix"></div>
                         
                  <div id="reply_message"></div>
                         
                     </form>
                     
                 </div>
             </div>
             <!--Input Field Box End-->
             
             <!--Contact Info Start-->
             <div class="col-md-4">
                <div class="box contact-info-wrapper">
                    <ul class="contact-info">
                        <li>
                             <div class="contact-info-icon">
                                 <span><i class="fa fa-flag"></i></span>
                             </div>
                             <div class="contact-info-text number">
                                 {{$contact->office_address}}
                             </div>
                         </li>
                         <li>
                             <div class="contact-info-icon">
                                 <span><i class="fa fa-phone-square"></i></span>
                             </div>
                             <div class="contact-info-text">
                                 Phone:<br><span class="font-number">{{$contact->mobile_one}}</span>
                             </div>
                         </li>
                         <li>
                             <div class="contact-info-icon">
                                 <span><i class="fa fa-envelope"></i></span>
                             </div>
                             <div class="contact-info-text number">
                                 Email:<br>{{$contact->email_one}}
                             </div>
                         </li>
                     </ul>
                     
                     <div data-height="41"></div>
                     
                   
                     
                     <div data-height="18"></div>
                     
                     <div class="button raised icon dark-grey ripple">
                         <div>
                             <a href="https://www.google.com/maps/place/Envato/@-37.817331,144.955652,17z/data=!3m1!4b1!4m2!3m1!1s0x6ad65d4c2b349649:0xb6899234e561db11?hl=en" target="_blank"><i class="fa fa-map-marker"></i>Open Map</a>
                         </div>
                     </div>
                     
                     <div class="clearfix"></div>
                     
                 </div>
             </div>
             <!--Contact Info End-->
             
         </div>
     </div>
    <div class="overlay" data-bg-color="#00c853" data-opacity="0.7"></div>
 </div>

@endsection