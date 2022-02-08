@extends('backend/master')
@section('title','Slider Create')
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

                                    <form role="form" method="post" action="{{ route('SliderStore') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Caption One</label>
                                            <input class="form-control" name="title" placeholder="Caption1" />

                                        </div>
                                   

                                        <div class="form-group">
                                            <label>Caption Two</label>
                                            <input class="form-control" name="sub_title" placeholder="Caption2" />

                                        </div>

                                        <div class="form-group">
                                            <label>Summary</label>
                                            <input class="form-control" name="sort_description" placeholder="sort_description" />

                                        </div>


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"/>
                                            <span style="color:red">Max Size: Width:1349px,Height:710px</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Preview Image</label>
                                            <img src="">
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