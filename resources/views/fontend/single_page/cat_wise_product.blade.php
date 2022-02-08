@extends('fontend.master')

@section('content')

    <!-- Banner Area -->
    <div class="construction-mini-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Category Wise Product</h2>
                </div>
                <div class="col-md-8">
                    <div class="construction-breadcumb">
                       <a href="#">home</a> / Catewise Product
                   </div>
                </div>
            </div>
        </div>
    </div> <!-- End Banner Area -->
    
    <!-- Project Items -->
    <div class="construction-content-area">
        <div class="container">
            <div class="row">

         @foreach($catwise as $cat)

         <div class="col-md-3">
             
                <img src="{{url('upload/product_image/'.$cat->product_image)}}" alt="" class="img-responsive">
                <div class="caption">
                  {{-- <h4 class="pull-right">$700.99</h4> --}}
                  <h4><a href="#">{{$cat->product_name}}</a></h4>
                 
                </div>
                
             
                <div class="btn-ground text-center">
                  
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#product_view{{@$cat->id}}"><i class="fa fa-search"></i> Quick View</button>
                </div>
                <div class="space-ten"></div>
              </div>
          
            @endforeach
              
            </div>
            
            
            <div class="load-more-wrap text-center wow fadeInUp">
                {{-- <a class="construction-btn" href="#">Load More</a> --}}
            </div>
        </div>
    </div> <!-- End Project Items -->



    @foreach($catwise as $cat)
    <div class="modal fade product_view" id="product_view{{@$cat->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
       
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="" style="margin: 0px">{{@$cat->product_name}}</h3>
            </div>
            <div class="modal-body">
                <img style="height: 400px;width: 466px" src="{{url('upload/product_image/'.$cat->product_image)}}" class="img-responsive">
            </div>
        </div>
    </div>
</div>
  @endforeach

@endsection