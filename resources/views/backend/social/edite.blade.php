@extends('backend/master')
@section('title','Social Edite page')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite Social</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edite Social Icon
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('SocialUpdate') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$edite->id}}" name="EditeId">

                                       <div class="form-group">
                                            <label>Icon Name</label>
                                            <input class="form-control" name="icon" value="{{@$edite->icon}}" placeholder="icon" />

                                        </div>

                                        <div class="form-group">
                                            <label>Url</label>
                                            <input class="form-control" name="url" value="{{@$edite->url}}" placeholder="url" />

                                        </div>



                                        <a href="{{ route('SocialIndex') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update Button</button>

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