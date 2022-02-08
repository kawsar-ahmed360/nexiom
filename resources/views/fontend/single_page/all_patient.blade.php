@extends('fontend.master')

@section('content')


<div class="page-title-area" style="background-image: url(fontend/img/page-banner/2.jpg);">
	<div class="container">
		<div class="page-title-content">
			<h2>All Patients</h2>
			<ul>
				<li>
                 <a href="{{route('MainIndex')}}">Home<i class="fa fa-chevron-right"></i></a>
				</li>
				<li>All Patients</li>
			</ul>
		</div>
	</div>
</div>
<section class="blog-area ptb-100">
	<div class="container">
		<div class="row">

             @foreach ($all_patients as $patients)
                 
            

			<div class="col-lg-4 col-md-6">
				<div class="single-news">
					<div class="news-img">
						<a href="blog-details.html">
							<img src="{{(@$patients->image)?url('upload/all_patient/'.$patients->image):''}}" alt="News">
						</a>
					 
					</div>
					<div class="news-text">
						
						<h3><a href="blog-details.html">{{@$patients->title}}</a></h3>
						<p>{{str_limit(@$patients->short_title,150)}}</p>
                    <a class="read-more" href="{{route('SinglePatient',$patients->slug)}}">
                     Read More
                      </a>
					</div>
				</div>
			</div>

            @endforeach


		</div>
		<div class="col-lg-12">
			<div class="pagenavigation-area">
				<nav aria-label="Page navigation example text-center">
					<ul class="pagination">
					  <li>{{@$all_patients->links()}}</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>

@endsection