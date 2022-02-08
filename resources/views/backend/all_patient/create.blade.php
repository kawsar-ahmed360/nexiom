@extends('backend/master')
@section('title','All Patient Create')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Patient Create</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Patient Create
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('AllPatientStore') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <label>Meta Title</label>
                                                <input class="form-control" name="meta_title" placeholder="meta_title" />
                                             </div>


                                             <div class="col-md-12">
                                                <label>Meta Description</label>
                                                <textarea class="form-control" name="meta_des" id="meta_des" cols="30" rows="5"></textarea>
                                             </div>


                                           
                                             <div class="col-md-6">
                                                <label>Name</label>
                                                <input class="form-control" name="title" placeholder="Name" />
                                             </div>

                                             <div class="col-md-6">
                                                <label>Short Title</label>
                                                <input class="form-control" name="short_title" placeholder="short_title" />
                                             </div>

                                        </div>
                                   

                                        <div class="form-group" style="padding-top:6px">

                                            <div class="col-md-12">
                                                <label>Description</label>
                                                 <textarea class="form-control ckeditor" name="description" id="" cols="30" rows="10"></textarea>
                                             </div>
                                           

                                        </div>


                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                                            <span style="color:red">Max Size: Width:360px,Height:250px</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Preview Image</label> <br>
                                            <img id="blah" alt="your image" width="100" height="100" />
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