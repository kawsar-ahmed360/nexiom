@extends('backend/master')
@section('title','Password Change')
@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Password Change Form</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Password Change <button class="btn btn-success btn-sm" id="Grnarate">Genarate Password</button> <input type="text" style="border:none;border-radius:4px;padding:4px" id="showpas">
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{ route('ChangePassUpdate') }}" enctype="multipart/form-data">
                                        @csrf


                                        <input type="hidden" value="{{@$user->id}}" name="User_id">


                                       <div class="form-group">
                                            <label>New Password</label> 
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="New Password" />

                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_passowrd" id="confirm_passowrd" value="" placeholder="Confirm Password" />

                                        </div>



                                        {{-- <a href="{{ route('SliderIndex') }}" class="btn btn-danger">Back</a> --}}
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                        

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

    @php
       $pass =  rand(000000000000,999999999999999);
    @endphp
   
      <input type="hidden" value="{{@$pass}}" id="passgen" >

@endsection

@section('footer')

 <script>
     $('#Grnarate').on('click',function(){

         var pas = $('#passgen').val();

          $('#password').val(pas);
          $('#confirm_passowrd').val(pas);
          $('#showpas').val(pas);

          

     
     })
 </script>
 
@endsection