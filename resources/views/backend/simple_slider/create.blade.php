@extends('backend/master')
@section('title','Slider Create')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Simple Slider</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Simple Slider
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('simpleSliderStore') }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="form-group">
                                            <label>Caption</label>
                                            <input class="form-control" name="title" placeholder="Caption" />

                                        </div> --}}
                                          <!-- <div class="form-group">
                                              <label> Title</label>
                                            <input class="form-control" name="sub_title" placeholder="Sub Title" />

                                        </div> -->
                                       {{--  <div class="form-group">
                                             <label>Short Description</label>
                                             <textarea class="form-control ckeditor" name="sort_description" rows="3"></textarea>
                                        </div> --}}


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="simple_slider_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                                            <span style="color:red">Max size : widht 670 x height 400</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Preview Image</label> <br>
                                            <img id="blah" alt="your image" width="100" height="100" />
                                        </div>



                                        <a href="{{ route('simpleSliderIndex') }}" class="btn btn-danger">Back</a>
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