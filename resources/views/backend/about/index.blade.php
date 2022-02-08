@extends('backend.master')

@section('title','All About')
@section('content')

<div id="wrapper">

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>All About</h2>
         
                    <div class="row">

                </div>
            </div>


            <hr />


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All About
                        </div>
                        <div class="panel-body">

                            @include('backend.partial.msg')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Title</th>
                                        <th>Short</th>
                                        <!-- <th>Description</th> -->
                                        
                                        <th width="17%;">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                              
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td>{{ $about->title }}</td>
                                        <td>{!! $about->short !!}</td>
                                        <!-- <td>{!! $about->description !!}</td> -->
                                    
                                     
                                        
                                        <td><a href="{{route('AboutEdite',$about->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                           
                                           
                                        </td>
                                    </tr>
                                  


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

