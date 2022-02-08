@extends('fontend.master')

@section('content')

    <!-- Banner Area -->
    <div class="construction-mini-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Products All</h2>
                </div>
                <div class="col-md-8">
                    <div class="construction-breadcumb">
                       <a href="#">home</a> / Product
                   </div>
                </div>
            </div>
        </div>
    </div> <!-- End Banner Area -->
    
    <!-- Project Items -->
    <div class="construction-content-area">
        <div class="container">
            <div class="row">
                @foreach($product as $pro)

         <div class="col-md-3">
             
                <img src="{{url('upload/product_image/'.$pro->product_image)}}" alt="" class="img-responsive">
                <div class="caption">
                  {{-- <h4 class="pull-right">$700.99</h4> --}}
                  <h4><a href="#">{{$pro->product_name}}</a></h4>
                 
                </div>
                
             
                <div class="btn-ground text-center">
                  
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#product_view{{@$pro->id}}"><i class="fa fa-search"></i> Quick View</button>
                </div>
                <div class="space-ten"></div>
              </div>
          
            @endforeach
{{-- 
             @foreach($product as $pro)
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <a class="single-project-item" href="{{(@$pro->product_image)?url('upload/product_image/'.$pro->product_image):''}}">  
                        <div class="single-project-preview single-project-bg-1" style='background: url("{{asset("upload/product_image/".$pro->product_image)}}");'></div>
                        <div class="single-project-info">
                            <h4>{{@$pro->product_name}}</h4>
                            
                        </div>
                    </a>
                </div>

                @endforeach --}}
               
            </div>
            
            
            
        </div>
    </div> <!-- End Project Items -->

@foreach($product as $pro)
    <div class="modal fade product_view" id="product_view{{@$pro->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
       
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="" style="margin: 0px">{{@$pro->product_name}}</h3>
            </div>
            <div class="modal-body">
                <img style="height: 400px;width: 466px" src="{{url('upload/product_image/'.$pro->product_image)}}" class="img-responsive">
            </div>
        </div>
    </div>
</div>
  @endforeach

@endsection