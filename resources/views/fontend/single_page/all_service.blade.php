@extends('fontend.master')
@section('title') Service @endsection
@section('content')



    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>SERVICE</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->


    <!--best-service-->
    <section class="blog_post best-service space clearfix">
        <div class="container">
            <div class="title-section center">
                <h2><span>OUR BEST SERVICE</span></h2>
            </div>
            <div class="row blog-slider">
                @foreach(@$service as $key=>$servic)
                <div class="col-lg-4 col-md-6 blog-post">
                    <figure class="sp-40">
                        <div class="post-img"><img src="{{(@$servic->image)?url('upload/service/'.@$servic->image):''}}" class="img-fluid " alt="img-blog">
                            <div class="mask"></div>
                            <a class="btn main-btn" href="{{route('ServiceSingle',$servic->slug)}}"> Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <figcaption class="blog_post-catipon-inner text-left ">
                            <h4><a href="{{route('ServiceSingle',$servic->slug)}}">{{@$servic->title}}</a></h4>
                            <p>{{@$servic->sub_title}}</p>
                        </figcaption>
                    </figure>
                </div>

                @endforeach


            </div>
        </div>
    </section>
    <!--best-service-->



@endsection