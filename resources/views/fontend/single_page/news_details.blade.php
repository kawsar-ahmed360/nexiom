@extends('fontend/master')
@section('title', 'News Details')

@section('meta_title') {{@$single_news->meta_title}} @endsection
@section('meta_des') {{@$single_news->meta_des}} @endsection

 @section('content')


     <div class="row breadcrumb-manu">
         <div class="container">
             <ul class="title-bredcum">
                 <li><a href="{{route('MainIndex')}}">Home</a></li>
                 <li> /</li>
                 <li>News Details</li>
             </ul>
         </div>
     </div>
     <!--breadcrumb section-->

     <!--best-service-->
     <section class="blog_post best-service space clearfix">
         <div class="container">
             <h3>{{@$single_news->title}}</h3>
             {!! @$single_news->description !!}
         </div>
     </section>


 
 @endsection  