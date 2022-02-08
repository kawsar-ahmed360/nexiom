@extends('backend.master')

@section('title','All Slider')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Simple Slider</h2>
                    <a style="float:right" href="{{ route('simpleSliderCreate') }}" class="btn btn-primary square-btn-adjust">Add Simple Slider</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Simple  Slider
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        {{-- <th>Title</th> --}}
                                        {{-- <th>Short Description</th> --}}
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $key=>$slider)
                                    <tr class="odd gradeX">
                                        <td>{{ $key + 1 }}</td>
                                        {{-- <td>{{ $slider->title }}</td> --}}
                                        {{-- <td>{!! $slider->sort_description !!}</td> --}}
                                        <td><img src="{{ asset('upload/simpleSlider/'.$slider->simple_slider_image) }}" class="img-thumbnail" width="100" height="100" /></td>

                                        <td class="center">{{ $slider->created_at }}</td>
                                        
                                        <td><a href="{{route('simpleSliderEdite',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                            <!-- <a href="{{route('SliderDelete',$slider->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->

                                              <form id="delete-form-{{ $slider->id }}" action="{{route('simpleSliderDelete',$slider->id)}}" style="display: none;" method="get">
                                               
                                               
                                                   </form>
                                                    <button type="submit" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            
                                           
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>

@endsection

