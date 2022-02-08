@extends('fontend.master')


@section('title') Product Details @endsection

@section('meta_title') {{@$product_detailsss->meta_title}} @endsection
@section('meta_des') {{@$product_detailsss->meta_des}} @endsection

@section('content')

    <!-- desktop-menu -->
    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>Products </li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <!--Product-details-->
    <section class="service-details space">
        <div class="container">
            <div class="row">


                <div class="col-lg-5 col-md-12 ser-details-img" style="margin-bottom: 103px;">
                    {{--<img src="{{(@$product_detailsss->product_image)?url('upload/product_image/'.@$product_detailsss->product_image):''}}" class=" img-fluid" alt="img">--}}
                    @foreach(@$pro_gallery as $key=>$gall)
                        @if(@$key==0)
                    <div class="" id="show" href="{{(@$gall->gallery)?url('upload/pro_gallery/'.@$gall->gallery):''}}">
                        <img src="{{(@$gall->gallery)?url('upload/pro_gallery/'.@$gall->gallery):''}}" id="show-img">
                    </div>
                        @endif
                    @endforeach
                    <div class="small-img">
                        <img src="{{asset('fontend/images/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">
                        <div class="small-container">
                            <div id="small-img-roll">
                                @foreach(@$pro_gallery as $key=>$gall)
                                <img src="{{(@$gall->gallery)?url('upload/pro_gallery/'.@$gall->gallery):''}}" class="show-small-img" alt="">
                                @endforeach
                                {{--<img src="https://placeimg.com/1000/1000/arch" class="show-small-img" alt="">--}}
                                {{--<img src="https://placeimg.com/1000/1000/nature" class="show-small-img" alt="">--}}
                                {{--<img src="https://placeimg.com/1000/1000/people" class="show-small-img" alt="">--}}
                                {{--<img src="https://placeimg.com/1000/1000/tech" class="show-small-img" alt="">--}}
                                <!-- <img src="https://picsum.photos/1000/1000/?random" class="show-small-img" alt=""> -->
                            </div>
                        </div>
                        <img src="{{asset('fontend/images/online_icon_right@2x.png')}}" class="icon-right" alt="" id="next-img">
                    </div>

                </div>
                <div class="col-lg-7 col-md-12">

                    <div class="title-section text-left pb-40">
                        <h4>{{@$product_detailsss->product_name}}</h4>
                    </div>

                    {!!@$product_detailsss->des!!}

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12" style="    margin-top: 52px;">
                    <div class="product-tabing">
                        <ul class="nav nav-tabs nav-tabs-custom" id="myTab" role="tablist">

                            @foreach($add_info as $key=>$addinfo)
                            <li class="nav-item">
                                <a class="nav-link tab-menu-custom {{(@$key==0)?'active':''}}" id="overview-tab" data-toggle="tab" href="#{{str_replace(' ','-',$addinfo->title)}}" role="tab" aria-controls="overview" aria-selected="true">{{@$addinfo->title}}</a>
                            </li>
                            @endforeach


                        </ul>


                        <div class="tab-content" id="myTabContent">
                            @foreach($add_info as $key=>$addinfo)
                            <div class="tab-pane fade {{(@$key==0)?'show active':''}}" id="{{str_replace(' ','-',$addinfo->title)}}" role="tabpanel" aria-labelledby="overview-tab">
                                <h5>{{@$addinfo->title}} </h5>
                                {!! @$addinfo->summary !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product-details-->


    <!--Product List-->
    <div class="blog-page main-container">
        <div class="container">
            <div class="title-section center  pb-30">
                <h2><span> Related Product</span></h2>
            </div>
            <div class="blog-post-templare row animate" data-anim-type="fadeIn" data-anim-delay="300">
                <div class="col-md-12">
                    <div class="row">

                        @foreach(@$related_pro as $key=>$rel)
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                                <div class="blog-image">
                                    <img src="{{($rel->product_image)?url('upload/product_image/'.$rel->product_image):''}}" alt="">
                                </div>
                                <div class="blog-details text-center">
                                    <div class="blog-meta"><a class="titletip" href="{{route('ProductDetails',@$rel->slug)}}"><i class="fas fa-retweet" title=""></i><span class="textTop">Compare Product</span> </a></div>
                                    <h3><a href="{{route('ProductDetails',@$rel->slug)}}">{{@$rel->product_name}}</a></h3>
                                    <p><strong>Model : </strong> {{@$rel->model}}</p>
                                    <p><strong>Bar :</strong> {{@$rel->bar}}</p>
                                    <a href="{{route('ProductDetails',@$rel->slug)}}" class="read-more">Find More</a>
                                    <!-- <a href="#home" class="titletip">Home<span class="textTop">Home</span></a> -->
                                </div>
                            </div>
                        </div>



                     @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Product List-->



@endsection