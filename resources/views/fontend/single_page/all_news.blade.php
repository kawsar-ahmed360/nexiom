@extends('fontend.master')


@section('title')
{{@$NewsPageSeo->meta_title}}
@endsection



@section('content')



	<div class="row breadcrumb-manu">
		<div class="container">
			<ul class="title-bredcum">
				<li><a href="{{route('MainIndex')}}">Home</a></li>
				<li>/</li>
				<li>News</li>
			</ul>
		</div>
	</div>
	<!--breadcrumb section-->


	<!--best-News-->
	<section class="blog_post best-service space clearfix">
		<div class="container">
			<div class="title-section center">
				<h2><span>OUR News</span></h2>
			</div>
			<div class="row blog-slider">

				@foreach(@$news as $key=>$newss)

				<div class="col-lg-4 col-md-6 blog-post">
					<div class="blog-post swiper-slide ">
						<figure>
							<div class="post-img"><img src="{{(@$newss->image)?url('upload/news/'.@$newss->image):''}}" class="img-fluid " alt="img-blog">
								<a class="btn main-btn" href="{{route('SingleNews',$newss->slug)}}"> read more </a>
							</div>
							<figcaption class="blog_post-catipon-inner text-left bg-color">
								<h4><a href="{{route('SingleNews',$newss->slug)}}">{{@$newss->title}}</a></h4>
								<p class="post_date"><span>{{date('d M Y',strtotime($newss->created_at))}}</span></p>
								<p>{{@$newss->summery}} </p>
							</figcaption>
						</figure>
					</div>
				</div>


            @endforeach



			</div>

		</div>
	</section>
	<!--best-News-->

@endsection