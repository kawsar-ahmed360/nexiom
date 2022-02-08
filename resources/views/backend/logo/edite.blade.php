@extends('backend.master')

@section('title','Edite Logo')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edte Logo Page</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edite Logo
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('LogoUpdate',$edite->id)}}" enctype="multipart/form-data">
                                        @csrf
                                       

                                   <div class="form-group">
                                     <label>Logo</label>
                                       <input type="file" name="logo" class="form-control">
                                      <span style="color:red">Max Size: Width:80px;Height:90px</span>
                                    </div>

                                    <div class="form-group">
                                     <label>Old Logo</label>
                                       <img src="{{(@$edite->logo)?url('upload/logo/'.$edite->logo):''}}">
                                    </div>

                                    <!--<div class="form-group">-->
                                    <!--    <label>Description</label>-->
                                    <!--    <textarea class="form-control ckeditor" rows="3" name="description">{{@$edite->description}}</textarea>-->
                                    <!--</div>-->
                                       

                                        {{--<div class="form-group">--}}

                                            {{--<select name="title_uri" class="form-control" style="width:60%; margin-bottom:5px">--}}
                                                {{--<option value="">Select Menu</option>--}}
                                                {{--@foreach($menu_all as $main_menu)--}}

                                                    {{--<option value="{{$main_menu->slug}}">{{$main_menu->menu_name}}</option>--}}

                                                {{--@endforeach--}}

                                            {{--</select>--}}

                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Short</label>--}}
                                            {{--<textarea class="form-control" rows="3" name="short"></textarea>--}}
                                        {{--</div>--}}
                                        
                                       





                                        <a href="{{ route('LogoIndex') }}" class="btn btn-danger">Back</a>
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