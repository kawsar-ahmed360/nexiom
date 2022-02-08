  @extends('fontend/master')
 @section('title', 'About Details')

  @section('content')



   <div class="construction-mini-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>About</h2>
                </div>
                <div class="col-md-8">
                    <div class="construction-breadcumb">
                       <a href="{{route('MainIndex')}}">home</a>
                   </div>
                </div>
            </div>
        </div>
    </div>


    <!--================who we are Area =================-->
  <div class="construction-content-area">
        <div class="container">
           <div class="row">
               <p>{!! @$About->description !!}</p>

           </div>
     </div>       
</div> 


  
  @endsection  