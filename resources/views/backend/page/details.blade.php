@extends('backend.master')

@section('title','Details')

@section('content')
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_content">
                <h3 title="About us"><img class="left_img" src="{{asset('front/img/banner/t-left-img.png') }}" alt="">{{$page->title}}<img class="right_img" src="{{asset('front/img/banner/t-right-img.png') }}" alt=""></h3>

            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================who we are Area =================-->
    <section class="who_we_are_area">
        <div class="container">
            <div class="welcome_title">
                <h3>{{$page->title}}</h3>
                <img src="{{asset('front/img/w-title-b.png')}}" alt="">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="who_we_left">

                        {!! $page->description !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================End who we are Area =================-->
@endsection
