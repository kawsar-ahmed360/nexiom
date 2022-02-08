@extends('backend.master')

@section('title','Edite Gallery')
@section('content')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edite Gallery</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Edite Gallery
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    @include('backend.partial.msg')

                                    <form role="form" method="post" action="{{route('GalleryUpdate',$edite->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="form-group">
                                            <label>Category Name</label>
                                             <select class="form-control" name="cat_id">
                                                 <option disabled="" selected="">--Select Category--</option>

                                                 @foreach($category as $category)
                                                  <option value="{{@$category->id}}" {{(@$edite['1']->cat_id==$category->id)?'selected':''}}>{{@$category->category_name}}</option>
                                                 @endforeach
                                             </select>

                                        </div> --}}

                                         <div class="form-group">
                                            <label>Gallery</label>
                                             <input type="file" name="gallery_image" class="form-control" multiple>
                                             <span style="color:red">Max Size: 280px,Height:270px</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Old Image</label>
                                              
                                            <img style="width: 100px" src="{{(@$edite->gallery_image)?url('upload/gallery/'.$edite->gallery_image):''}}" alt="">

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