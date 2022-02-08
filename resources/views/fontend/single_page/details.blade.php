@extends('fontend.master')

@section('title')
    {{@$page->title}}
@endsection
@section('meta_title') {{@$page->meta_title}} @endsection
@section('meta_des') {{@$page->meta_des}} @endsection
@section('content')


    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>  {{@$page->title}}</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <section class="blog_post best-service space clearfix">
        <div class="container">
            <h3>{{@$page->title}}</h3>
            {!! @$page->description !!}
        </div>
    </section>

 

@endsection
