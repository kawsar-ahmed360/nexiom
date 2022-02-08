@extends('backend/master')
@section('title','Edite Contact')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite Contact</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View Contact
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('ContactUpdate') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" value="{{@$edite->id}}" name="editeId">
                                        <div class="form-group">
                                            <label>Land</label>
                                            <input class="form-control" name="mobile_one" value="{{@$edite->mobile_one}}" placeholder="mobile_one" />

                                        </div>
                                       
                                         <div class="form-group">
                                            <label>Multiple Mobile Number</label>
                                            <input class="form-control" name="mobile_two" value="{{@$edite->mobile_two}}" placeholder="mobile_two" />

                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email_one" value="{{@$edite->email_one}}" placeholder="email_one" />

                                        </div>

                                          <div class="form-group">
                                            <label>Multiple Email Address</label>
                                            <input class="form-control" name="email_two" value="{{@$edite->email_two}}" placeholder="email_two" />

                                        </div>



                                         {{-- <div class="form-group">
                                            <label>Web One</label>
                                            <input class="form-control" name="web_one" value="{{@$edite->web_one}}" placeholder="web_one" />

                                        </div>

                                        <div class="form-group">
                                            <label>Web Two</label>
                                            <input class="form-control" name="web_two" value="{{@$edite->web_two}}" placeholder="web_two" />

                                        </div> --}}


                                        <div class="form-group">
                                            <label>Office Address</label>
                                            <input class="form-control" name="office_address" value="{{@$edite->office_address}}" placeholder="office_address" />

                                        </div>



                                        <div class="form-group">
                                            <label>Google Map Link</label>
                                            <input class="form-control" name="web_one" value="{{@$edite->web_one}}" placeholder="Map Link" />

                                        </div>

                                        <div class="form"></div>

                                        <div class="form-group">
                                            <label>Contact Title</label>
                                            <input class="form-control" name="contact_title" value="{{@$edite->contact_title}}" placeholder="contact title" />

                                        </div>


                                        <div class="form-group">
                                            <label>Contact Summary</label>
                                            <input class="form-control" name="contact_summary" value="{{@$edite->contact_summary}}" placeholder="contact summary" />

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