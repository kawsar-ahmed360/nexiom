@extends('fontend.master')

@section('content')

<div class="page-title-area" style="background-image: url(fontend/img/page-banner/2.jpg);">
	<div class="container">
		<div class="page-title-content">
			<h2>Gallery</h2>
			<ul>
				<li>	<a href="index.html">
					Home
					<i class="fa fa-chevron-right"></i>
					</a>
				</li>
				<li>Gallerys</li>
			</ul>
		</div>
	</div>
</div>


    
<div class="project-area f7fafe-bg ">
    <div class="container">
       <div class="section-title">
          <!-- <span>Team</span> -->
          <h2> Our Gallery</h2>
       </div>
       
       <div id="Container" class="row">
      
    @foreach ($gallery as $gall)
       
   

          <div class="col-lg-4 col-md-4 mix gallery-item 1 3">
             <div class="single-project" >
                <img  src="{{(@$gall->gallery_image)?url('upload/gallery/'.$gall->gallery_image):''}}" alt="">
                <div class="project-text">
                   <a href="{{(@$gall->gallery_image)?url('upload/gallery/'.$gall->gallery_image):''}}" >
                   <i class="fa fa-eye"></i>
                   </a>
                </div>
             </div>
          </div>

         @endforeach
       </div>
    </div>
 </div>

@endsection