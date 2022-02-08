@extends('fontend.master')


@section('content')

<div class="page-title-area" style="background-image: url(fontend/img/page-banner/2.jpg);">
    <div class="container">
        <div class="page-title-content">
         <h2>Patient Details</h2>
    <ul>
       <li>
    <a href="{{route('MainIndex')}}">Home <i class="fa fa-chevron-right"></i></a>
     </li>
    <li>{{@$patient_details->title}}</li>
  </ul>
 </div>
</div>
</div>



<section class="blog-details-area ptb-100">
 <div class="container">
     <div class="row">
        <h2>=> &nbsp;&nbsp;{{@$patient_details->title}}:</h2>
       <div class="col-lg-12 col-md-12">
     
         <div class="blog-details-desc">
             
           <div class="article-image">
             <img style="width:600px;display:block;margin:0 auto;" src="{{(@$patient_details->image)?url('upload/all_patient/'.$patient_details->image):''}}" alt="image">
         </div>

    <div class="article-content">
    

 
 
    <p>{!!@$patient_details->description!!}</p>


 </div>






      </div>
</div>




  
    </div>
    </div>
    </section>


@endsection
