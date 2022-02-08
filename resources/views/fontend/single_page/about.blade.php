@extends('fontend.master')

@section('title')
{{@$single_about->title}}
@endsection

@section('content')


    <div class="row breadcrumb-manu">
        <div class="container">
            <ul class="title-bredcum">
                <li><a href="{{route('MainIndex')}}">Home</a></li>
                <li>/</li>
                <li>About</li>
            </ul>
        </div>
    </div>
    <!--breadcrumb section-->

    <section class="blog_post best-service space clearfix">
        <div class="container">
            <h3>{{@$single_about->title}}</h3>
            {!! @$single_about->description !!}
        </div>
    </section>




    {{--$single_about--}}
@endsection
