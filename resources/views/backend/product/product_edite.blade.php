@extends('backend.master')

@section('title','Edite Gallery')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite Product</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edite Gallery
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('ProductUpdate',$edite->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category Name</label>
                                             <select class="form-control" name="cat_id">
                                                 <option disabled="" selected="">--Select Category--</option>

                                                 @foreach($category as $catego)
                                                  <option value="{{@$catego->id}}" {{(@$edite->cat_id==$catego->id)?"selected":''}}>{{@$catego->category_name}}</option>
                                                 @endforeach
                                             </select>

                                        </div>


                                         <div class="form-group">
                                            <label>Product Name</label>
                                             <input type="text" name="product_name" value="{{@$edite->product_name}}" class="form-control">

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Model</label>
                                                <input type="text" class="form-control" name="model" value="{{@$edite->model}}" placeholder="Enter Model">
                                            </div>


                                            <div class="col-md-6">
                                                <label for="">Bar</label>
                                                <input type="text" class="form-control" name="bar" value="{{@$edite->bar}}" placeholder="Enter bar">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Product Description</label>
                                             <textarea class="form-control ckeditor" name="des" id="" cols="30" rows="6">{!!$edite->des!!}</textarea>

                                        </div>

                                         <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="product_image" class="form-control">
                                            <span style="color:red">Max Size: Width:560px, Height:380px</span>
                                        </div>


                                        <div class="form-group">
                                            <label>Old Image</label> <br>

                                            <img style="width: 100px;" src="{{(@$edite->product_image)?url('upload/product_image/'.@$edite->product_image):''}}" alt="">

                                        </div>


                                        <div class="form-group">
                                            <label>Product Gallery</label>
                                            <input type="file" class="form-control" name="gallery[]" multiple placeholder="Category" />
                                            <span style="color:red">Max Size: Width:1000px, Height:1000px</span>
                                        </div>



                                        <div class="form-group">
                                            <label>Old Gallery Image</label> <br>

                                            @foreach(@$pro_gallery as $key=>$gal)
                                            <img style="width: 100px;" src="{{(@$gal->gallery)?url('upload/pro_gallery/'.@$gal->gallery):''}}" alt="">

                                                @endforeach
                                        </div>




                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="badge badge-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    SEO TOOLS
                                                </a>

                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">
                                                        <label for="">Meta title</label>
                                                        <input type="text" name="meta_title" class="form-control" value="{{@$edite->meta_title}}" placeholder="enter meta title">


                                                        <label for="">Meta Description</label>
                                                        <textarea name="meta_des" class="form-control" id="" cols="2" rows="3" placeholder="Enter Meta description">{!! @$edite->meta_des !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>



                                        <a href="{{ route('ProductCatWiseIndex') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

                                    </form>
                                    <br />




                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
            <!-- /. ROW  -->

            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

@endsection