<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin : Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('backend/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('backend/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
@push('css')
    #wrapper {
    width: 100%;
    background: #fff !important;
    }
@endpush
</head>
<body>
<div class="container">
    <div class="row text-center ">
        <div class="col-md-12">
            <br /><br />
            <h2> Admin : Login</h2>

            <h5>( Login yourself to get access )</h5>
            <br />
        </div>
    </div>
    <div class="row ">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>   Enter Details To Login </strong>
                </div>
                <div class="panel-body">
                    @if(isset(Auth::user()->email))
                        <script>window.location="/adminlogin/successlogin";</script>
                     @endif

                    @if($message    =   Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong> {{$message}}</strong>
                            </div>
                        @endif
                        @if(count($errors) >0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form role="form" method="POST" action="{{ route('login') }}">
                        <br />
                        <!-- {{csrf_field()}} -->
                        @csrf
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Your mail account " />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                        </div>
                        {{-- <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" /> Remember me
                            </label>
                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a>
                                            </span>
                        </div> --}}

                        <input type="submit" name="login" class="btn btn-primary " value="Login">
                        <hr />

                    </form>
                </div>

            </div>
        </div>


    </div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{ asset('backend/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ asset('backend/js/jquery.metisMenu.js')}}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('backend/js/custom.js')}}"></script>

</body>
</html>
