  @extends('fontend/master')
  @section('title', 'Service Details')

  @section('meta_title') {{@$service_details->meta_title}} @endsection
  @section('meta_des') {{@$service_details->meta_des}} @endsection

  @section('content')
      <div class="row breadcrumb-manu">
          <div class="container">
              <ul class="title-bredcum">
                  <li><a href="{{route('MainIndex')}}">Home</a></li>
                  <li> /</li>
                  <li>Service Details</li>
              </ul>
          </div>
      </div>
      <!--breadcrumb section-->

      <!--best-service-->
      <section class="blog_post best-service space clearfix">
          <div class="container">
              <h3>{{@$service_details->title}}</h3>
              {!! @$service_details->description !!}
          </div>
      </section>

  
  @endsection  