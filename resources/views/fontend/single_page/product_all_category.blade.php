@extends('fontend.master')
@section('title') All Category @endsection
@section('content')


    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>Category</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->


    <!--best-service-->
    <section class="blog_post best-service space clearfix">
        <div class="container">
            <div class="title-section center">
                <h2><span>Product Category</span></h2>
            </div>
            <div class="row blog-slider">
                <div class="top-margin packages">
                    <div class="row">

                        @foreach(@$product_category as $key=>$pro_cate)

                        <div class="col-md-4">
                            <div class="our-packages">
                                <div class="packages-thumb">
                                    <a href="{{route('CategoryProduct',base64_encode(@$pro_cate->id))}}"><img itemprop="image" src="{{(@$pro_cate->category_image)?url('upload/category_image/'.$pro_cate->category_image):''}}" alt=""></a>
                                    <div class="packages-info">
                                        <h2 itemprop="name"><a itemprop="url" href="{{route('CategoryProduct',base64_encode(@$pro_cate->id))}}" title="">{{@$pro_cate->category_name}}</a></h2>
                                        <ul>

                                            <li><i class="far fa-arrow-alt-circle-right"></i>  Brand: {{@$pro_cate->brand_name}} <img class="flag" src="{{(@$pro_cate->brand_image)?url('upload/Brand/'.$pro_cate->brand_image):''}}"></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{--<div class="col-md-4">--}}
                            {{--<div class="our-packages">--}}
                                {{--<div class="packages-thumb">--}}
                                    {{--<a href=""><img itemprop="image" src="fontend/images/img/packages1.jpg" alt=""></a>--}}
                                    {{--<div class="packages-info">--}}
                                        {{--<h2 itemprop="name"><a itemprop="url" href="#" title="">Industrial cleaning Machine</a></h2>--}}
                                        {{--<ul>--}}
                                            {{--<li><i class="far fa-arrow-alt-circle-right"></i>  Brand: Dertzen  <img class="flag" src="fontend/images/jerman.png"></li>--}}

                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-4">--}}
                            {{--<div class="our-packages">--}}
                                {{--<div class="packages-thumb">--}}
                                    {{--<a href=""><img itemprop="image" src="fontend/images/img/packages1.jpg" alt=""></a>--}}
                                    {{--<div class="packages-info">--}}
                                        {{--<h2 itemprop="name"><a itemprop="url" href="#" title="">Industrial cleaning Machine</a></h2>--}}
                                        {{--<ul>--}}
                                            {{--<li><i class="far fa-arrow-alt-circle-right"></i>  Brand: Dertzen <img class="flag" src="fontend/images/jerman.png"></li>--}}

                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--best-service-->




@endsection