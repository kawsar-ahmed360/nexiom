@extends('fontend.master')


@section('content')

	<div class="row breadcrumb-manu">
		<div class="container">
			<ul class="title-bredcum">
				<li><a href="{{route('MainIndex')}}">Home</a></li>
				<li>/</li>
				<li>  {{@$news->title}}</li>
			</ul>
		</div>
	</div>
	<!--breadcrumb section-->

	<section class="blog_post best-service space clearfix">
		<div class="container">
			<h3>{{@$news->title}}</h3>
			{!! @$news->description !!}
		</div>
	</section>




@endsection