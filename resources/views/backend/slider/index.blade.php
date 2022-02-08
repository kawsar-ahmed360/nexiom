@extends('backend.master')

@section('title','All Slider')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Slider</h2>
                    <a style="float:right" href="{{ route('SliderCreate') }}" class="btn btn-primary square-btn-adjust">Add Slider</a>
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Slider
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Caption One</th>
                                        <th>Caption Two</th>
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
                                        <td>{{ $slider->title }}</td>
                                        <td>{!!@$slider->sub_title!!}</td>
                                        {{-- <td>{!! $slider->sort_description !!}</td> --}}
                                        <td><img src="{{ asset('upload/slider/'.$slider->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                                        <td class="center">{{ $slider->created_at }}</td>
                                        <td><a href="{{route('SliderEdite',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                <a href="{{route('SliderDelete',$slider->id)}}" id="delete" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></a>

                                              
                                {{-- {{route('SliderDelete',$slider->id)}}    --}}
                                           
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

