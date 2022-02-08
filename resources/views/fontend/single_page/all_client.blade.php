@extends('fontend.master')


@section('title') All Client @endsection

@section('content')

    <!-- desktop-menu -->
    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li>Clients</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <!--blog-page-content-->
    <div class="blog-page main-container space">
        <div class="container">
            <div class="title-section center">
                <h2><span>OUR Clients</span></h2>
            </div>

            <div class="blog-post-templare row animate" data-anim-type="fadeIn" data-anim-delay="300">
                <div class="row">

                    @foreach(@$clients as $key=>$clie)
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 col-6">
                        <figure class="testimonial">
                            <a href="{{@$clie->url}}">
                                <div class="pic-bg">
                                    <div class="pic">
                                        <img src="{{(@$clie->image)?url('upload/Client/'.@$clie->image):''}}" alt="partner">
                                    </div>
                                </div>
                            </a>
                        </figure>
                    </div>

                        @endforeach

                </div>
            </div>
        </div>
    </div>
    <!--blog-page-content-->


@endsection