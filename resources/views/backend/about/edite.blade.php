
@extends('backend/master')
@section('title','Edite About')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite About</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View About
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('AboutUpdate') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$edite->id}}" name="editeId">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="{{@$edite->title}}" placeholder="title" />

                                        </div>


                                        
                                        <div class="form-group">
                                            <label>Short</label>
                                           <textarea class="form-control ckeditor" name="short" placeholder="short">{{@$edite->short}}</textarea>

                                        </div>
                                       
                                 


                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description" placeholder="description">{{@$edite->description}}</textarea>

                                        </div> 



                                       <div class="form-group">
                                            <label>Image</label>
                                            <input class="form-control" type="file" name="image"  placeholder="title" />
                                            <span style="color:red">Max Size: Width:720px,Height:450px</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Old Image</label>
                                          <img style="width:100px" src="{{(@$edite->image)?url('upload/about/'.$edite->image):''}}" alt="">
                                          
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="badge badge-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">SEO Tools
                                                </a>

                                                <div class="collapse" id="collapseExample">

                                                    <div class="card card-body">
                                                        <br>
                                                        <label for="">Meta Title</label>
                                                        <input type="text" class="form-control" name="meta_title" value="{{@$edite->meta_title}}" placeholder="Enter Meta title">

                                                        <label for="">Meta Description</label>
                                                        <input type="text" class="form-control" name="meta_des" value="{{@$edite->meta_des}}" placeholder="Enter Meta Description">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>



                                        <a href="{{ route('AboutIndex') }}" class="btn btn-danger">Back</a>
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



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

@endsection