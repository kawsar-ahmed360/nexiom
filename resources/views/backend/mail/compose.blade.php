@extends('backend.master')

@section('title','Mail Send page')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mail Compsoe page</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Mail Compsoe Page
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('MailSubmit') }}" enctype="multipart/form-data">
                                        @csrf

                                         <div class="form-group">
                                            <label>Mail</label>
                                            <input class="form-control" name="email" value="{{Session('send_mail')}}" placeholder="email" />

                                        </div>

                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input class="form-control" name="subject" placeholder="Title" />

                                        </div>

                                        

                                        <div class="form-group">
                                            <label>Description</label>
                                             <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>

                                        </div>
                                  
                                       



                                        <a href="" class="btn btn-danger">Back</a>
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