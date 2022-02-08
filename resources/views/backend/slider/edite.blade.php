@extends('backend/master')
@section('title','Slider Edite Page')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Slider</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Slider
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('SliderUpdate') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$edite->id}}" name="editeId">
                                        <div class="form-group">
                                            <label>Caption One</label>
                                            <input class="form-control" name="title" value="{{@$edite->title}}" placeholder="Caption1" />

                                        </div>

                                        <div class="form-group">
                                            <label>Caption Two</label>
                                            <input class="form-control" name="sub_title" value="{{@$edite->sub_title}}" placeholder="Caption2" />

                                        </div>


                                        <div class="form-group">
                                            <label>Summary</label>
                                            <input class="form-control" name="sort_description" value="{{@$edite->sort_description}}" placeholder="sort_description" />

                                        </div>

                                          <!-- <div class="form-group">
                                              <label> Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title" />

                                        </div> -->
                                       {{--  <div class="form-group">
                                             <label>Short Description</label>
                                             <textarea class="form-control ckeditor" name="sort_description" rows="3">{{@$edite->sort_description}}</textarea>
                                        </div> --}}


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/> <br>
                                            <span style="color:red">Max Size: Width:1349px,Height:710px</span>
                                        </div> <br>

                                        <div class="form-group">
                                            <label>Old Image</label> <br>
                                            <img src="{{(@$edite->image)?url('upload/slider/'.$edite->image):''}}" height="100px" width="100px">
                                        </div>



                                        <a href="{{ route('SliderIndex') }}" class="btn btn-danger">Back</a>
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
@endsection