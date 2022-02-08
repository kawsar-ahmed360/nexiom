@extends('backend.master')

@section('title','Add Category')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Porduct Category</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Product Category
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('ProductCategoryStore')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" class="form-control" name="category_name" placeholder="Category" />

                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <input type="text" class="form-control" name="brand_name" placeholder="brand_name" />

                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Category Image</label>
                                                    <input type="file" class="form-control" name="category_image" placeholder="Category" />
                                                  <span style="color:red">Max Size: Width:370px, Height:300px</span>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Brand Image</label>
                                                    <input type="file" class="form-control" name="brand_image" placeholder="Category" />
                                                    <span style="color:red">Max Size: Width:424px, Height:421px</span>
                                                </div>
                                            </div>

                                        </div>

                                        
                                       

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
                                        
                                       





                                        {{-- <a href="{{ route('CategoryIndex') }}" class="btn btn-danger">Back</a> --}}
                                        <a href="{{ route('ProductCategoryIndex') }}" class="btn btn-info">All Category</a>
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