@extends('fontend.master')


@section('content')

	<div class="row breadcrumb-manu">
		<div class="container">
			<ul class="title-bredcum">
				<li><a href="{{route('MainIndex')}}">Home</a></li>
				<li>/</li>
				<li>Contact Us</li>
			</ul>
		</div>
	</div>
	<!--breadcrumb section-->


	<!--contact-section-->
	<div class="section-contact space1">
		<div class="container contact space2">
			<div class="row">
				<div class="col-lg-12 col-md-12 cont-desc">
					<div class="title-section t-border">
						<h2>Get In Touch With Our Experts</h2>
					</div>
				</div>
				<div class="col-lg-7 col-md-12 cont-desc">
					<p class="title-desc"><b>{{@$contact->contact_title}}</b></p>
					<p>{{@$contact->contact_summary}}</p>
					<div class="row other-cont-area bg-color">
						<div class="icon_col">
							<span><i class="fas fa-mobile-alt icon"></i></span>
						</div>
						<div class="col">
							<h4> Mobile </h4>
							<p> {{@$contact->mobile_two}} </p>
						</div>
					</div>
					<div class="row other-cont-area bg-color">
						<div class="icon_col">
							<span><i class="fas fa-envelope icon"></i></span>
						</div>
						<div class="col">
							<h4> Email </h4>
							<p> {{@$contact->email_one}}</p>
						</div>
					</div>
					<div class="row other-cont-area bg-color">
						<div class="icon_col">
							<span><i class="fas fa-location-arrow icon"></i></span>
						</div>
						<div class="col">
							<h4> Address </h4>
							<p>{{@$contact->office_address}}</p>
						</div>
					</div>

					<ul class="social-icons">
						@foreach(@$socialIcon as $key=>$social)
						<li><a href="{{@$social->url}}"><i class="{{@$social->icon}}"></i></a></li>
						@endforeach
						{{--<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
						{{--<li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
						{{--<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>--}}
					</ul>
				</div>
				<div class="col-lg-5 col-md-12 cont-form">
					<div class="col-lg-12 col-md-12 form-desc">
						<h3>CONTACT US</h3>
						<h4>We Will Be Glad To Help You</h4>
						<form action="{{route('ContactStore')}}" method="post">
							@csrf

						<div class="form-group col-md-12">
							<div class="input-group">
								<input type="text" class="form-control" name="name" placeholder="Name">
							</div>
						</div>
						<div class="form-group col-md-12">
							<div class="input-group">
								<input type="text" class="form-control" name="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group col-md-12">
							<div class="input-group">
								<input type="text" class="form-control" name="msg_subject" placeholder="Subject">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group col-md-12">
								<textarea class="form-control" name="message" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="col-md-12 mini_subscribe-btn pt-4">
						 <button type="submit" class="btn btn-primary">Submit</button>
						</div>

						</form>
					</div>
				</div>
			</div>
		</div>



			<iframe src="{{@$contact->web_one}}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

	</div>
	<!--contact-section-->


@endsection