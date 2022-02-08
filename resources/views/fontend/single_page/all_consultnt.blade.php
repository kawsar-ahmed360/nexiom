@extends('fontend.master')

@section('title')
{{@$consultnt->meta_title}}
@endsection

@section('content')


<div class="page-title-area" style="background-image: url(fontend/img/page-banner/2.jpg);">
	<div class="container">
		<div class="page-title-content">
			<h2>All Consultnt</h2>
			<ul>
				<li>
                 <a href="{{route('MainIndex')}}">Home<i class="fa fa-chevron-right"></i></a>
				</li>
				<li>All Consultnt</li>
			</ul>
		</div>
	</div>
</div>
<section class="blog-area ptb-100">
	<div class="container">
		<div class="row">

             @foreach ($all_consultnt as $consult)
                 
            

			<div class="col-lg-3 col-md-6">
				<div class="single-news">
					<div class="news-img">
						<a href="blog-details.html">
							<img src="{{(@$consult->image)?url('upload/consultnt/'.$consult->image):''}}" alt="News">
						</a>
					 
					</div>
					<div class="news-text">
						
				        <p style="font-weight: bold;font-size:16px;">{{@$consult->name}}</p>
						<p style="text-align:left">{{str_limit(@$consult->short_title,150)}}</p>
                        
					</div>
				</div>
			</div>

            @endforeach


		</div>
		<div class="col-lg-12">
			<div class="pagenavigation-area">
				<nav aria-label="Page navigation example text-center">
					<ul class="pagination">
					  <li>{{@$all_consultnt->links()}}</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>

@endsection