@extends('fontend.singlePageMaster')

@section('title')
{{@$single_about->title}}
@endsection

@section('content')

  
  <!--Single Page Header Start-->
  <div class="page-header" data-bg-color="#212121" data-image-src="{{asset('fontend/images/upload/about-us-page-bg-image.jpg')}}">
    <div class="fit-screen-wrap">
          <div class="container">
              <div class="page-header-wrap animate-fadeIn">
                  <h2 class="featured-area-title">Special Offer</h2>
                  <div data-height="30"></div>
                  <div class="featured-area-subtitle">
                      {!!$special_Offer->short!!}
                  </div>
              </div>
          </div>
      </div>
      <div class="overlay" data-bg-color="#212121" data-opacity="0.4"></div>
  </div>
  <!--Single Page Header End-->
  
  <!--Single Page Content Body Start-->
  <div class="page-content" data-midnight="darkColor">
      <div class="container">
      
          <h1 class="page-title">Special Offer</h1>
          
          <p><span class="dropcap">{!!$special_Offer->description!!}</p>
          
          <div data-height="1"></div>
    
          <!--Blockquote-->
       
          
          <div data-height="30"></div>
      
    
      </div>
  </div>


@endsection
