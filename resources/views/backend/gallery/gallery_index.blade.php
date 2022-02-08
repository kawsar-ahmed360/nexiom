@extends('backend.master')

@section('title','All Gllary ')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Gallery</h2>
                        <a style="float:right" href="{{ route('GalleryCreate') }}" class="btn btn-primary square-btn-adjust">Add Gallery</a>
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Category
                            </div>
                            <div class="panel-body">

                                @include('backend.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">SL.</th>
                                            <th style="text-align: center">Image</th>
                                            <!-- <th>Image</th> -->
                                            
                                            <th style="text-align: center" width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gallery as $key=>$gallery)
                                            <tr class="odd gradeX">
                                                <td style="text-align: center">{{ $key + 1 }}</td>
                                                {{-- <td>{{ $gallery->GalleryCategory['category_name'] }}</td> --}}
                                                <td style="text-align: center"><img style="width: 100px" src="{{(@$gallery->gallery_image)?url('upload/gallery/'.$gallery->gallery_image):''}}" alt=""></td>

                                                

                                                <td style="text-align: center">
                                                    <a href="{{route('GalleryEdite',$gallery->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{route('GalleryDelete')}}" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Delete</a>
                                                    
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