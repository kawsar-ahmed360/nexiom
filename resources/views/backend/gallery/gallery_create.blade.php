@extends('backend.master')

@section('title','Add Gallery')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Gallery</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Gallery
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('GalleryStore')}}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="form-group">
                                            <label>Category Name</label>
                                             <select class="form-control" name="cat_id">
                                                 <option disabled="" selected="">--Select Category--</option>

                                                 @foreach($category as $category)
                                                  <option value="{{@$category->id}}">{{@$category->category_name}}</option>
                                                 @endforeach
                                             </select>

                                        </div> --}}

                                         <div class="form-group">
                                            <label>Gallery</label>
                                             <input type="file" name="gallery_image" class="form-control" multiple>
                                             <span style="color:red">Max Size: 280px,Height:270px</span>
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
                                        
                                       





                                        <a href="{{ route('GalleryIndex') }}" class="btn btn-danger">Back</a>
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