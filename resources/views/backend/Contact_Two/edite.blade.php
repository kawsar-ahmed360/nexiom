@extends('backend/master')
@section('title','Edite Second Contact page')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite Contact Two</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edite Contact Two
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('ContactTwoUpdate') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$edite->id}}" name="editeId">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" value="{{@$edite->address}}" placeholder="address" />

                                        </div>
                                       
                                       <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="mobile" value="{{@$edite->mobile}}" placeholder="mobile" />

                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="hours" value="{{@$edite->hours}}" placeholder="opens" />

                                        </div>

                                      




                                        



                                        <a href="{{ route('ContactIndex') }}" class="btn btn-danger">Back</a>
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