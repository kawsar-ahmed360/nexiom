@extends('backend.master')

@section('title','All Page')
@section('content')

    <div id="wrapper">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Page</h2>
                      
                        <div class="row">

                        </div>
                    </div>


                    <hr />


                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Page
                            </div>
                            <div class="panel-body">

                                @include('backend.partial.msg')
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>URI</th>
                                            <th>Image</th>
                                            <th width="17%;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($page as $key=>$page)
                                            <tr class="odd gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $page->title }}</td>
                                                <td>{{ $page->title_uri }}</td>
                                                <td><img src="{{ asset('upload/page/'.$page->image) }}" class="img-thumbnail" width="100" height="100" /></td>

                                                <td style="vertical-align: middle;text-align: center">
                                                    <a href="{{route('PageEdite',$page->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                  <a href="{{route('PageDelete',$page->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Delete</a>

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